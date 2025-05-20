<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Form;

class LoginForm extends Form
{
    public $email;
    public $password;


    /**
     * Reglas de validacion
     * @return string[]
     */
    public function rules():array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }

    /**
     * Mensajes de errores de validaciones
     * @return string[]
     */
    public function messages():array
    {
        return [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El formato del email es invalido',
            'email.exists' => 'El email no se encuentra registrado',

            'password.required' => 'La contraseña es obligatoria',
        ];
    }


    public function login()
    {
        $this->validate();
        if (Auth::attempt($this->all())) {
            Request::session()->regenerate();
            return redirect()->intended('/trabajadores');
        }
    }


}
