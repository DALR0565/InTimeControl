@props(['title' => config('app.name')])
<header class="w-full bg-white dark:bg-gray-900 shadow p-4 border-b border-gray-200 dark:border-gray-700">
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-bold">{{ $title }}</h1>
    </div>
</header>
