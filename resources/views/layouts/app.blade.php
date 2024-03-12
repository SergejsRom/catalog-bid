<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-gray-100">
    <!-- component -->
<div class="h-16 w-full bg-black bg-opacity-50">
    <div class="w-full h-full flex justify-center items-center">
        <div
            class="flex h-full items-center  hover:bg-black hover:bg-opacity-50">
            <div class="mx-4 text-white"><a href="catalog/login">Login</a></div>
            <div class=" h-8 w-px bg-gray-300"></div>
        </div>
        
        <div class="flex h-full  items-center hover:bg-black hover:bg-opacity-50">
            <div class="mx-4 text-white"><a href="catalog/register">Register</a></div>
        </div>
    </div>
</div>
    <div class="max-w-7xl mx-auto">
        {{ $slot }}
    </div>

    @filamentScripts
    @vite('resources/js/app.js')
    @livewire('notifications')
</body>

</html>
