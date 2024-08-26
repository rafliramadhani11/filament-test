<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased mx-auto max-w-7xl" x-cloak x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode === true }">
    {{ $slot }}

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
