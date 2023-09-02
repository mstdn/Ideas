@props(['title'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? ""}} - {{ config('app.name', 'Meows') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        @include('partials.top-nav')
        @include('partials.sidebar')

        <main class="p-4 md:ml-64 h-auto pt-20">
            <x-banner />

            {{ $slot }}
            @include('partials.footer')
        </main>


    </div>

    @if (session('success_message'))
        <x-notification-success
            :redirect="true"
            message-to-display="{{ (session('success_message')) }}"
        />
    @endif

    @stack('modals')

    @livewireScripts
</body>

</html>
