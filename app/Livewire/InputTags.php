<?php

namespace App\Livewire;

use Livewire\Component;

class InputTags extends Component
{
    public $stringTags = '';
    public $arrayTags = [];

    public function tagsLoad()
    {
        
    }
    public function render()
    {

        return view('livewire.input-tags');
        
    }
}
