<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Pizza-Shop:@yield('title')</title>


    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">


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


</head>
<body>


@if(\Illuminate\Support\Str::startsWith(request()->path(), 'admin'))
    @include('layouts.admin-header')
@else
    @include('layouts.header')
@endif

<main>
    <section class="py-5 text-center container">
        @if (session()->has('success'))
            <p class="alert alert-success">{{ session()->get('success') }}</p>
        @endif
        @if (session()->has('warning'))
            <p class="alert alert-warning">{{ session()->get('warning') }}</p>
        @endif

        @yield('content')
    </section>

{{--    <div class="album py-5 bg-light">--}}
{{--        <div class="container">--}}

{{--            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">--}}
{{--                <div class="col">--}}
{{--                    <div class="card shadow-sm">--}}
{{--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}

{{--                        <div class="card-body">--}}
{{--                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
{{--                            <div class="d-flex justify-content-between align-items-center">--}}
{{--                                <div class="btn-group">--}}
{{--                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
{{--                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
{{--                                </div>--}}
{{--                                <small class="text-muted">9 mins</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="card shadow-sm">--}}
{{--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}


</main>

@include('layouts.footer')

<script src="/js/bootstrap.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>
</html>
