<?php

namespace App\Livewire;

use App\Livewire\Forms\WriterCreateForm;
use App\Livewire\Forms\WriterEditForm;
use App\Models\Writer;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Writers extends Component
{

    use WithFileUploads;
    use WithPagination;

    #[Url(as:'Escritores')]
    public $searchWriters = '';

    public writerCreateForm $writerCreated;
    public writerEditForm $writerEdit;

    public $arrayTags = [];


    public function save()
    {
        $this->writerCreated->studies = implode(',', $this->arrayTags);
        $this->writerCreated->save();

        $this->arrayTags = [];

        $this->resetPage(pageName: 'pageWriter');

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

        $this->dispatch('writer-updated', 'Se actualizo el registro');
    }

    #[On('delete-writer')]
    public function delete($writerId)
    {

        $writer = Writer::find($writerId);

        $writer->each->delete();

        $this->dispatch('writer-deleted', 'Se elimino el registro');
    }

    public function render()
    {
        $writers = Writer::when($this->searchWriters,function ($query){
            $query->where('name', 'like', "%{$this->searchWriters}%")
                  ->orWhere('last_name', 'like', "%{$this->searchWriters}%")
                  ->orWhere('email', 'like', "%{$this->searchWriters}%")
                  ->orWhere('profession', 'like', "%{$this->searchWriters}%");
                })
            ->orderBy('id', 'desc')
            ->paginate(5, pageName: 'pageWriter');

        return view('livewire.writer', compact('writers'));
    }
}
