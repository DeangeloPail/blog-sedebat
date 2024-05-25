<?php

namespace App\Livewire\Forms;

use App\Models\Writer;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WriterCreateForm extends Form
{
    #[Rule('required|min:3')]
    public $name;
    #[Rule('required|min:3')]
    public $last_name;
    #[Rule('required|min:3')]
    public $email;
    #[Rule('required|min:3')]
    public $location;
    #[Rule('min:5')]
    public $profession;
    #[Rule('min:3')]
    public $studies;
    #[Rule('min:5')]
    public $description;

    public function save()
    {
        $this->validate();

        $writer = Writer::create(
            $this->only('name', 'last_name', 'email', 'location', 'profession', 'location', 'studies', 'description')
        );

        $writer->reset();
    }
}
