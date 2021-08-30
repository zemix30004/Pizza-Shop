
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pizza-Shop:@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ '/css/bootstrap.min.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ '/css/starter-template.css' }}" type="text/css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">Pizza-Shop</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
                <li @routeactive('categor*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
                </li>
                <li @routeactive('cart*')><a href="{{ route('cart') }}">@lang('main.cart')</a></li>
                <li><a href="{{  route('reset') }}">@lang('main.reset_project')</a></li>
                <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                @endguest

                @auth
                    @admin(Auth::user()->isAdmin())
                            <li><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                    @else
                            <li><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                    @endadmin
                    <li><a href="{{ route('get-logout') }}">@lang('main.logout')</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        @if (session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if (session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif
    @yield('content')
    </div>
</div>
</body>
</html>
