<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
    @livewireScripts
    @wireUiScripts
    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>
<div class="flex min-h-screen bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    @auth
        <x-sidebar />
    @endauth
    <div class="flex-1 flex flex-col overflow-hidden">
        @auth
        <x-header />
        @endauth
        <main class="flex-1 overflow-x-auto p-4 sm:p-6 lg:p-8">
            {{ $slot }}
        </main>
    </div>
</div>
</body>
</html>
