<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/storage/img/server/sku.png">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('js/jquery-3.4.1.js') }} "></script>
    <script src="{{ asset('js/content-script.js') }} "></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>

    </style>
    @yield('style')
</head>
<body>
    <div class="">
        <nav class="navbar navbar-expand-md  bg-main">
            <a class="navbar-brand" href="/">
                <img src="/storage/img/server/sku.png" width="70px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link mr-1" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mr-1" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mr-1" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mr-1" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        <a class="nav-link mr-1" href="/login">Login</span></a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link mr-1" href="/register">Register</span></a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-md-2" type="text" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-md-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>
