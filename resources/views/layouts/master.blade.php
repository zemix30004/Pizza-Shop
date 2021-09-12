
	<!doctype html>
	<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Pizza-Shop">
		<meta name="generator" content="Hugo 0.88.1">
		<title>Pizza-Shop</Pizza-Shop></title>
		<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

			<title>Pizza-Shop:@yield('title')</title>


		{{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
		{{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

		<style>
			.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
			}

			@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
			}
		</style>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}
		{{-- <link rel="stylesheet" href="{{ '/css/starter-template.css' }}" type="text/css">
		<link rel="stylesheet" href="{{ '/css/bootstrap.min.css' }}" type="text/css" --}}
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<script src="/js/bootstrap.min.js"></script>

	</head>
	<body>
	<header>
		<div class="navbar navbar-dark bg-dark shadow-sm">
		<div class="container">
			<a href="#" class="navbar-brand d-flex align-items-center">
			<strong>Все продукты</strong>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>

		</div>
	</div>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="row">
				<div class="col-sm-8 col-md-7 py-4">
					<h4 class="text-white">Главная</h4>
					<p class="text-muted">О нас</p>
				</div>
				<div class="col-sm-4 offset-md-1 py-4">
					<h4 class="text-white">Все продукты</h4>
					<ul class="list-unstyled">
				<div class="col-sm-4 offset-md-1 py-4">
					<h4 class="text-white">Категории</h4>
					<ul class="list-unstyled">
						<div class="col-sm-4 offset-md-1 py-4">
							<h4 class="text-white">Корзина</h4>
							<ul class="list-unstyled">
						<li><a href="#" class="text-white">Регистрация</a></li>
						<li><a href="#" class="text-white">Войти</a></li>
						<li><a href="#" class="text-white">Отзывы</a></li>
						</ul>
					</div>
				</div>
					</div>
					<div class="navbar-header">
						<a class="navbar-brand" href="{{ route('index') }}">Pizza-Shop</a>
			</div>
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
							<li @routeactive('categor*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
							</li>
							<li @routeactive('cart*')><a href="{{ route('cart') }}">@lang('main.cart')</a></li>
							<li><a href="{{ route('reset') }}">@lang('main.reset_project')</a></li>
							<li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
						</ul></div>
					<div class="collapse bg-dark" id="navbarHeader">
			</div>
			</div>
		<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
					aria-haspopup="true" aria-expanded="false">
					{{ \App\Services\CurrencyConversion::getCurrencySymbol() }}<span class="caret"></span></a>
					<ul class="dropdown-menu">
							@foreach (\App\Services\CurrencyConversion::getCurrencies() as $currency)
								<li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>
							@endforeach
					</ul>
				</li>
			</ul></button>
						<ul class="nav navbar-nav navbar-right">
							@guest
							<li><a href="{{ route('login') }}">@lang('main.login')</a></li>
							@endguest
							@auth
									@admin
									{{-- (Auth::user()->isAdmin()){{ Auth::user()->name }} --}}
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
	</div>
	</header>
	<main>
	<section class="py-5 text-center container">
		<div class="row py-lg-5">
			<div class="col-lg-6 col-md-8 mx-auto">
			<h1 class="fw-light">Pizza-Shop</h1>
			<p class="lead text-muted">Только на нашем сайте вы можете выбрать качественный и вакусный продукт по приличным ценам</p>
			<p>
				<a href="#" class="btn btn-primary my-2">Выберите подходящий продукт</a>
					<a href="#" class="btn btn-secondary my-2">Другое</a>
				</p>
				</div>
			</div>
	</section>
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card shadow-sm">
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
						</div>
						</div>
					</div>
				</div>
				</div>
				</div>
				</div>
			</div>
	</div>
	</main>
	<footer class="text-muted py-5">
	<div class="container">
		<p class="float-end mb-1">
			<a href="#">Вернуться вверх</a>
		</p>
		<p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
		<p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
	</div>
	</footer>
		<script src="/js/bootstrap.min.js"></script>
		<script src="{{ '/js/bootstrap.min.js' }}" type="text/js"></script>
	</body>
	</html>

