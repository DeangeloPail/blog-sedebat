<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Articulos extends Component
{

    use WithPagination;

    #[Url(as:'s')]
    public $searchingNews = '';

    public function render()
    {

        $news =  DB::table('news')
        ->join('writers', 'news.writer_id', '=', 'writers.id')
        ->select('news.id', 'news.descripcion_img', 'news.titulo', 'news.img', 'news.contenido', 'news.destacada', 'writers.name', 'writers.img as writerImg', 'writers.email', 'news.created_at')
        ->when($this->searchingNews,function ($query){
            $query->where('news.titulo', 'like', "%{$this->searchingNews}%")
                  ->orWhere('writers.name', 'like', "%{$this->searchingNews}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(5, pageName: 'pageArticulo');

        return view('livewire.articulos', compact('news'));
        
    }

}
