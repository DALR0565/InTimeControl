<?php

namespace App\Livewire\Forms;

use App\Models\Trabajador;
use Livewire\Form;

class TrabajadoresForm extends Form
{

    public ?Trabajador $trabajador;


    public $nombre = '';
    public $nss = '';

    public $rfc = '';

    public $curp = '';
    public $telefono = '';

    public $email = '';

    public $direccion = '';
    public $proyecto_id = 0;

    /**
     * Reglas de validacion
     * @return string[]
     */
    public function rules():array
    {
        $id = $this->trabajador->id ?? 'NULL';

        return [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'nss' => 'required|digits:11|unique:trabajadores,nss,' . $id,
            'rfc' => 'required|alpha_num|between:12,13|unique:trabajadores,rfc,' . $id,
            'curp' => 'required|alpha_num|size:18|unique:trabajadores,curp,' . $id,
            'telefono' => 'required|digits_between:7,15',
            'email' => 'required|email|unique:trabajadores,email,' . $id,
            'direccion' => 'required|regex:/^[\pL\pN\s\-,.#º°áéíóúÁÉÍÓÚñÑ\/]+$/u',
            'proyecto_id' => 'nullable|integer|min:1',
        ];
    }

    /**
     * Mensajes de errores de validaciones
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',

            'nss.required' => 'El NSS es obligatorio',
            'nss.digits' => 'El NSS solo debe contener 11 digitos',
            'nss.unique' => 'El NSS ya se encuentra registrado',

            'rfc.required' => 'El RFC es obligatorio',
            'rfc.alpha_num' => 'El RFC solo puede contener letras y números.',
            'rfc.between' => 'El RFC debe tener entre 12 y 13 caracteres.',
            'rfc.unique' => 'El RFC ya se encuentra registrado.',

            'curp.required' => 'La CURP es obligatoria.',
            'curp.alpha_num' => 'La CURP solo puede contener letras y números.',
            'curp.size' => 'La CURP debe tener exactamente 18 caracteres.',
            'curp.unique' => 'La CURP ya se encuentra registrada',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 a 15 dígitos.',

            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El formato del email es invalido',
            'email.unique' => 'El email ya se encuentra registrado',

            'direccion.required' => 'La direccion es obligatoria.',
            'direccion.regex' => 'La dirección es inválida. Ejemplo válido: Av. Juárez #45, Col. Centro',

            'proyecto_id.integer' => 'El proyecto debe ser un entero positivo',
            'proyecto_id.min' => 'El proyecto debe ser un entero positivo',
        ];
    }

    public function setTrabajador(Trabajador $trabajador)
    {
        $this->trabajador = $trabajador;

        $this->nombre = $trabajador->nombre;
        $this->nss = $trabajador->nss;
        $this->rfc = $trabajador->rfc;
        $this->curp = $trabajador->curp;
        $this->telefono = $trabajador->telefono;
        $this->email = $trabajador->email;
        $this->direccion = $trabajador->direccion;
        $this->proyecto_id = $trabajador->proyecto_id;
    }

    public function store()
    {
        $this->validate();
        Trabajador::create($this->all());
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->trabajador->update(
            $this->all()
        );

    }

}
