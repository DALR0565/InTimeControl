<?php

namespace App\Livewire\Trabajadores;

use App\Livewire\Forms\TrabajadoresForm;
use Livewire\Component;

class Create extends Component
{
    public $proyectos = [];
    public TrabajadoresForm $form;

    public function mount($proyectos)
    {
        $this->proyectos = $proyectos;
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
    public function back()
    {
        $this->redirect('/trabajadores');
    }

    public function save()
    {
        $this->form->store();
        $this->back();
    }
    public function render()
    {
        return view('livewire.trabajadores.create');
    }
}
