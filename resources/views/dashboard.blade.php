<x-app-layout>
    <x-slot name="title">
        {{ "Dashboard - ".config('app.name') }}
    </x-slot>
    @yield('content')
</x-app-layout>

