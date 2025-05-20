@extends('dashboard')
@section('content')
    <h1 class="text-2xl font-bold mb-4">Trabajadores</h1>
    <div class="overflow-x-auto">
        @livewire('tables.trabajadores-table')
        <div class="flex justify-end">
            <x-link
                label="Crear nuevo trabajador"
                href="{{ route('trabajadores.create') }}"
                blue
                sm
            />
        </div>
    </div>
@endsection
