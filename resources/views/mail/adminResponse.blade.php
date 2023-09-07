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

<div class="card my-5 p-5 w-75 mx-auto shadow-lg blurred-orange text-center">
    <div class="card-title h3">
        From {{ $data['full_name'] ?? '' }}
    </div>
    <div class="card-body h5">
        Email:
        <br>
        {{ $data['email'] ?? '' }}
        <br>
        <br>
        Message:
        <br>
        {{ $data['text'] ?? '' }}
    </div>
</div>
</body>
