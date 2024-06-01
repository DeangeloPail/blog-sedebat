<?php

namespace App\Livewire;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class TagsInput extends Component
{
    public $label = '';
    public $placeholder = '';

    public $stringTags = '';

    #[Modelable]
    public $arrayTags;

    public function tagsLoad()
    {
        if (!empty($this->stringTags)) {
            if (!empty($this->arrayTags)) {
                if (strpos($this->stringTags, ',') == false) {

                    array_push($this->arrayTags, $this->stringTags);
                } else {

                    $tempArray = explode(',', $this->stringTags);
                    for ($i = 0; $i < count($tempArray); $i++) {
                        $tempArray[$i] = sanitizedString($tempArray[$i]);
                        if ($tempArray[$i] != "") {
                            array_push($this->arrayTags, $tempArray[$i]);
                        }
                    }
                }
            } else {

                $tempArray = explode(',', $this->stringTags);
                for ($i = 0; $i < count($tempArray); $i++) {
                    $tempArray[$i] = sanitizedString($tempArray[$i]);
                    if ($tempArray[$i] != "") {
                        array_push($this->arrayTags, $tempArray[$i]);
                    }
                }
            }
        }

        $this->stringTags = '';
    }

    public function deleteTag($key)
    {
        unset($this->arrayTags[$key]);
        $this->arrayTags = array_values($this->arrayTags);
    }

    public function render()
    {
        return view('livewire.tags-input');
    }
}
