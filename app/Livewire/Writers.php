<?php

namespace App\Livewire;

use App\Livewire\Forms\writerCreateForm;
use App\Livewire\Forms\writerEditForm;
use App\Models\Writer;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Writers extends Component
{
    public $writer;

    public writerCreateForm $writerCreate;
    public writerEditForm $writerEdit;


    public function mount()
    {
        $this->writer = Writer::all();
    }

    public function save()
    {
        $this->writerCreate->save();
        $this->writer = Writer::all();

        $this->dispatch('writer-created', 'Se almaceno el registro');
    }

    public function edit($writerId)
    {
        $this->resetValidation();
        $this->writerEdit->edit($writerId);
    }

    public function update()
    {
        $this->writerEdit->update();
        $this->writer = Writer::all();

        $this->dispatch('writer-updated', 'Se actualizo el registro');
    }

    public function delete($writerId)
    {
        $writer = Writer::find($writerId);

        $writer->delete();

        $this->writer = Writer::all();
        $this->dispatch('writer-deleted', 'Se elimino el registro');
    }

    public function render()
    {
        return view('livewire.writer');
    }
}
