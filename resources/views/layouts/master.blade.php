
	<!doctype html>
	<html lang="en">
		<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Pizza-Shop">
		<meta name="generator" content="Hugo 0.88.1">
		<title>Pizza-Shop</title>
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

@include('layouts.header')

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

    @include('layouts.footer')

		<script src="/js/bootstrap.min.js"></script>
		<script src="{{ '/js/bootstrap.min.js' }}" type="text/js"></script>
	</body>
	</html>

