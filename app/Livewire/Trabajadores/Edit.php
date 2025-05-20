<?php

namespace App\Livewire\Trabajadores;

use App\Livewire\Forms\TrabajadoresForm;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class Edit extends Component
{
    use WireUiActions;
    public TrabajadoresForm $form;
    public $proyectos = [];

    public function mount($trabajador, $proyectos)
    {
        $this->proyectos = $proyectos;
        $this->form->setTrabajador($trabajador);
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
        $this->form->update();
        session()->flash('success', 'Trabajador editado correctamente.');
        $this->back();
    }
    public function render()
    {
        return view('livewire.trabajadores.edit');
    }
}
