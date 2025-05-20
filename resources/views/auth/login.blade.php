<x-app-layout>
    <x-slot name="title">
        {{ "Login - ".config('app.name') }}
    </x-slot>
    @livewire('auth.login')
</x-app-layout>
