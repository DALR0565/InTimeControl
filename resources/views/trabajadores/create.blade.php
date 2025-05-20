@extends('dashboard')
@section('content')
    @livewire('trabajadores.create', ['proyectos' => $proyectos])
@endsection
