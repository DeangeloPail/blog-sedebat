<?php

namespace App\Livewire;

use App\Models\Writer;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Autors extends Component
{
    use WithPagination;

    #[Url(as:'s')]
    public $searchWriters = '';

    public function render()
    {
        $writers = Writer::when($this->searchWriters,function ($query){
            $query->where('name', 'like', "%{$this->searchWriters}%")
                  ->orWhere('last_name', 'like', "%{$this->searchWriters}%");
                })
            ->orderBy('id', 'desc')
            ->paginate(12, pageName: 'pageWriter');
        return view('livewire.autors', compact('writers')) ;
    }
}
