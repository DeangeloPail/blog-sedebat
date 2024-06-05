<?php

namespace App\Livewire\Forms;

use App\Models\Writer;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class WriterCreateForm extends Form
{
    #[Validate]
    public $name;
    #[Validate]
    public $last_name;
    #[Validate]
    public $email;
    #[Validate]
    public $location;
    #[Validate]
    public $profession;
    #[Validate]
    public $studies;

    public $description;

    public $image;

    public function rules()
    {
        return [

            'name' => 'required|alpha|min:3|max:25',

            'last_name' => 'required|alpha|min:3|max:25',

            'location' => 'required',

            'profession' => 'required|alpha',

            'studies' => 'required|alpha',

            'email' => [
                'required',
                'regex:/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/',
                'string',
                'lowercase',
                'max:255',
                function ($attribute, $value, $fail) {
                    $existingEmail = Writer::where('email', $value)->first();
                    if ($existingEmail) {
                        $fail('El correo ya está registrada en la base de datos.');
                    }
                }
            ],
            

        ];
    }

    protected function messages()
    {
        return [
            'name' => [
                'required' => 'El nombre es requerido',
                'alpha' => 'El nombre solo puede contener letras',
                'min' => 'El nombre debe tener al menos :min caracteres',
                'max' => 'El nombre no puede tener más de :max caracteres',
            ],
            'last_name' => [
                'required' => 'El apellido es requerido',
                'alpha' => 'El apellido solo puede contener letras',
                'min' => 'El apellido debe tener al menos :min caracteres',
                'max' => 'El apellido no puede tener más de :max caracteres',
            ],
            'location' => [
                'required' => 'La ubicación es requerida',
                'alpha' => 'La ubicación solo puede contener letras',
            ],
            'profession' => [
                'required' => 'La profesión es requerida',
                'alpha' => 'La profesión solo puede contener letras',
            ],
            'studies' => [
                'required' => 'Los estudios son requeridos',
                'alpha' => 'Los estudios solo pueden contener letras',
            ],
            
        ];
    }

    public function save()
    {

        $this->validate();


        $writer = Writer::create(
            $this->only('name', 'last_name', 'email', 'location', 'profession', 'location', 'studies', 'description')
        );

        if($this->image){
            $writer->img = $this->image->store('writers');
            $writer->save();
        }

        $this->reset();
    }
}
