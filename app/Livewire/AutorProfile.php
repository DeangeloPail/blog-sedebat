<?php

namespace App\Livewire;

use App\Models\News;
use App\Models\Writer;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class AutorProfile extends Component
{
    use WithPagination;

    #[Url(as:'s')]
    public $searchingNews = '';

    public $id;
    public $writer;

    public function mount($id)
    {

        $this->id = $id;
        $this->writer = Writer::query()
        ->when($id, function ($query, $id) {
            return $query->where('id', 'like', '%' . $id . '%');
        })->first();

       
    }

    public function render()
    {   
        $news =  News::where('writer_id', $this->id)
        ->when($this->searchingNews,function ($query){
            $query->where('titulo', 'like', "%{$this->searchingNews}%");
            })
        ->orderBy('id', 'desc')
        ->paginate(10, pageName: 'pageArticulo');

        return view('livewire.autor-profile',compact('news'));
    }
}
