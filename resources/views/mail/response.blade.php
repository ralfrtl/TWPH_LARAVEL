<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<div class="card my-5 py-5 px-1 mx-auto shadow-lg blurred-orange text-center" style="width: 500px; max-width: 100%;">
    <div class="card-title h3">
        {{ $data['header'] ?? '' }}
    </div>
    <div class="card-body h5">
        {{ $data['body'] ?? '' }}
    </div>
    <div class="card-body h5">
        {{ $data['footer'] ?? '' }}
    </div>
</div>
</body>
