<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Boolpress') }}</title> --}}
    <title>@yield('title', 'Admin')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="admin">
        <div class="d-flex">
            @include('admin.partials.sidebar')
            <div id="wrapper">
                @include('admin.partials.header')
                <main class="container">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>