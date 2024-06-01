<?php

namespace App\Livewire;

use App\Livewire\Forms\WriterCreateForm;
use App\Livewire\Forms\WriterEditForm;
use App\Models\Writer;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Writers extends Component
{

    use WithFileUploads;

    public writerCreateForm $writerCreated;
    public writerEditForm $writerEdit;

    public $writers;

    public $arrayTags = [];

    public function mount()
    {
        $this->writers = Writer::all();
    }

    public function save()
    {
        $this->writerCreated->studies = implode(',', $this->arrayTags);
        $this->writerCreated->save();

        $this->arrayTags = [];
        $this->writers = Writer::all();

        $this->writerCreated->image = '';
        $this->dispatch('writer-created', 'Se almaceno el registro');
    }

    public function showModal()
    {
        $this->dispatch('modal-press', 'hola');
    }

    public function edit($writerId)
    {
        $this->resetValidation();
        $this->writerEdit->edit($writerId);
    }

    public function update()
    {
        $this->writerEdit->update();
        $this->writers = Writer::all();

        $this->dispatch('writer-updated', 'Se actualizo el registro');
    }


    #[On('delete-writer')]
    public function delete($writerId)
    {

        $writer = Writer::find($writerId);

        $writer->each->delete();

        $this->writers = Writer::all();
        $this->dispatch('writer-deleted', 'Se elimino el registro');
    }



    public function render()
    {
        return view('livewire.writer');
    }
}
