@extends('dashboard')
@section('content')
    @livewire('trabajadores.edit', ['trabajador' => $trabajador, 'proyectos' => $proyectos])
@endsection
