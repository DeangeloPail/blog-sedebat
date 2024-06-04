<?php

namespace App\Livewire;

use App\Models\Writer;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class CreateArticulo extends Component
{
    use WithFileUploads;
    use WithPagination;

    #[Url(as:'Escritores')]
    public $searchWriters = '';


    public function render()
    {
        $writers = Writer::when($this->searchWriters,function ($query){
            $query->where('name', 'like', "%{$this->searchWriters}%")
                  ->orWhere('last_name', 'like', "%{$this->searchWriters}%")
                  ->orWhere('email', 'like', "%{$this->searchWriters}%")
                  ->orWhere('profession', 'like', "%{$this->searchWriters}%");
                })
            ->orderBy('id', 'desc')
            ->paginate(8, pageName: 'pageWriter');

        return view('livewire.create-articulo', compact('writers'));
    }
}
