<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Админка: @yield('title')</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ '/css/starter-template.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ '/css/bootstrap.min.css' }}" type="text/css"
    <link rel="stylesheet" href="{{ '/js/bootstrap.min.js' }}" type="text/js"> --}}

    {{-- <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/dist/js/bootstrap.bundle.min.js" rel="stylesheet"> --}}
    <script src="/js/bootstrap.min.js"></script>
    {{-- <script src="/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="/assets/dist/js/bootstrap.bundle.min.js"></script> --}}
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Окно регистрации</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin">Админ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Главная</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
{{-- <div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                Вернуться на сайт
            </a> --}}

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
            @admin
            <li class="nav-item">
                    <li ><a href="{{ route('categories.index') }}">Категории</a></li>
                    <li ><a href="{{ route('products.index') }}">Товары</a></li>
                    <li ><a href="{{ route('home') }}">Заказы</a></li>
            @endadmin
                </ul>
            @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                </ul>
            @endguest

            @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
            @admin
                                Администратор
            @else               {{ Auth::user()->name }}
            @endadmin
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
            @endauth
            </div>
        </div>
    </nav>
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
</div>

