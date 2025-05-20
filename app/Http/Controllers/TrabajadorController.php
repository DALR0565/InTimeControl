<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('trabajadores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyectos = Proyecto::all()->mapWithKeys(function ($proyecto) {
            return [
                $proyecto->id => $proyecto->nombre . ' (' . $proyecto->id_compuesto . ')',
            ];
        });
        return view('trabajadores.create', compact('proyectos'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trabajador $trabajador)
    {
        $proyectos = Proyecto::all()->mapWithKeys(function ($proyecto) {
            return [
                $proyecto->id => $proyecto->nombre . ' (' . $proyecto->id_compuesto . ')',
            ];
        });
        return view('trabajadores.edit', compact('trabajador','proyectos'));
    }
}
