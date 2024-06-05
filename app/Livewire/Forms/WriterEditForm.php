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

    #[Validate]
    public $name;
    #[Validate]
    public $last_name;
    #[Validate]
    public $email;
    #[Validate]
    public $location;
    #[Validate]
    public $profession;
    #[Validate]
    public $studies;
    
    public $oldImage;
    public $image;
    public $currentEmail;

    public $arrayTags = [];
    #[Rule('min:5')]
    public $description;

    public function rules()
    {
        return [

            'name' => 'required|alpha|min:3|max:25',

            'last_name' => 'required|alpha|min:3|max:25',

            'location' => 'required',

            'profession' => 'required',

            'studies' => 'required',

            'email' => [
                'required',
                'regex:/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/',
                'string',
                'lowercase',
                'max:255',
                function ($attribute, $value, $fail) {

                    if(($this->currentEmail != $value))
                    {
    
                        $existingContribuyente = Writer::where('email', $value)->first();
    
                        if ($existingContribuyente) {
                            $fail('El correo electrónico ya se encuentra registrado.');
                        }
                    }
                
                    
                
                }
            ],
            

        ];
    }

    protected function messages()
    {
        return [
            'name' => [
                'required' => 'El nombre es requerido',
                'alpha' => 'El nombre solo puede contener letras',
                'min' => 'El nombre debe tener al menos :min caracteres',
                'max' => 'El nombre no puede tener más de :max caracteres',
            ],
            'last_name' => [
                'required' => 'El apellido es requerido',
                'alpha' => 'El apellido solo puede contener letras',
                'min' => 'El apellido debe tener al menos :min caracteres',
                'max' => 'El apellido no puede tener más de :max caracteres',
            ],
            'location' => [
                'required' => 'La ubicación es requerida',
                'alpha' => 'La ubicación solo puede contener letras',
            ],
            'profession' => [
                'required' => 'La profesión es requerida',
                'alpha' => 'La profesión solo puede contener letras',
            ],
            'studies' => [
                'required' => 'Los estudios son requeridos',
                'alpha' => 'Los estudios solo pueden contener letras',
            ],
           
        ];
    }

    public function edit($writerId)
    {

        $this->writerId = $writerId;

        $writer = Writer::find($writerId);

        $this->name = $writer->name;
        $this->last_name = $writer->last_name;
        $this->email = $writer->email;  
        $this->currentEmail = $writer->email;
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
