<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title', config('app.name', 'Laravel'))
        </title>
        <link rel="icon" href="/storage/img/server/sku.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.js') }} "></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/lux.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('style')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md bg-main shadow-sm sticky-top">
                <div class="container pt-1 pb-1">
                    <a class="navbar-brand" href="{{ url('/') }}" title="{{ config('app.name', 'Laravel') }}">
                        <img src="/storage/img/server/sku.png">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <img src="/storage/img/server/hamburger.svg">
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item m-0">
                                <a class="nav-link" href="{{ route('trending') }}">ກະທູ້ທີ່ນິຍົມ</a>
                            </li>
                            <li class="nav-item m-0">
                                <a class="nav-link" href="{{ route('latest') }}">ກະທູ້ລ່າສຸດ</a>
                            </li>
                            <li class="nav-item m-0">
                                <a class="nav-link" href="{{ route('announcements') }}">ແຈ້ງການ</a>
                            </li>
                            @auth
                                <li class="nav-item m-0">
                                    <a class="nav-link" href="/myclass">ຫ້ອງຮຽນ</a>
                                </li>
                                {{-- <li class="nav-item m-0">
                                    <a class="nav-link" href="#">ອາຈານປະຈໍາວິຊາ</a>
                                </li> --}}
                                <li class="nav-item m-0">
                                    <a class="nav-link" href="/showschedule">ຕາຕະລາງ</a>
                                </li>
                                @if(($sch = Auth::user()->teachSchedules)->count()? $sch->toQuery()->where('date', '>=', date('Y-m-d'))->get()->count():false)
                                    <li class="nav-item m-0">
                                        <a class="nav-link" href="/showteachschedule">ຕາຕະລາງສອນ</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item m-0">
                                    <a class="nav-link" href="{{ route('login') }}">ເຂົ້າສູ່ລະບົບ</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item m-0">
                                        <a class="nav-link" href="{{ route('register') }}">ລົງທະບຽນ</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-link">
                                    <notification-bell user-id="{{ Auth::user()->id }}" />
                                </li>
                                <li class="nav-item m-0 dropdown d-flex align-items-center">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="/profile/{{ Auth::user()->id }}" class="dropdown-item">ໂປຣໄຟລ໌</a>
                                        <a href="/createblog" class="dropdown-item">ສ້າງກະທູ້</a>
                                        @if(Auth::user()->role == 'admin')
                                            <a href="/insertschedule" class="dropdown-item">ເພີ່ມຊົ່ວໂມງຮຽນ</a>
                                            <a href="/dashboard" class="dropdown-item">ແຜງຄວບຄຸມ</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            ອອກຈາກລະບົບ
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
    
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        

    </body>
</html>
