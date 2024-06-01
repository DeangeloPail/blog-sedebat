<?php

namespace App\Livewire\Forms;

use App\Models\Writer;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WriterEditForm extends Form
{
    public $writerId = '';

    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|min:3')]
    public $last_name;
    #[Rule('required|min:3')]
    public $email;
    #[Rule('required|min:3')]
    public $location;
    #[Rule('min:5')]
    public $profession;
    #[Rule('min:3')]
    public $studies;
    
    public $oldImage;
    public $image;

    public $arrayTags = [];
    #[Rule('min:5')]
    public $description;

    public function edit($writerId)
    {

        $this->writerId = $writerId;

        $writer = Writer::find($writerId);

        $this->name = $writer->name;
        $this->last_name = $writer->last_name;
        $this->email = $writer->email;  
        $this->location = $writer->location;
        $this->profession = $writer->profession;
        $this->studies = $writer->studies;
        $this->arrayTags  = explode(",", $writer->studies);
        $this->description = $writer->description;
        $this->oldImage = asset("storage/$writer->img");

    }

    public function update()
    {
        $this->validate();

        $this->studies = implode(',', $this->arrayTags);

        $writer = Writer::find($this->writerId);

        $writer->update(
            $this->only('name', 'last_name', 'email', 'location', 'profession', 'location', 'studies', 'description')
        );

         // Eliminar la imagen anterior si existe y se está cargando una nueva
         if ($writer->img && $this->image) {
            Storage::delete($writer->img);
        }

        if($this->image){
            $writer->img = $this->image->store('writers');
            $writer->save();
        }

        $this->reset();
    }
}
