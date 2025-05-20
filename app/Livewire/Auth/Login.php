<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function save()
    {
        $this->form->login();
    }

    /**
     * Validamos en tiempo real los campos
     * @param $property
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
