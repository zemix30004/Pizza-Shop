@extends('master')

@section('title, 'Категория' . $category->name)

@section('content')
    <div class="starter-template">
        <h1>
            {{ $category->name }}
        </h1>
        <p>
            {{ $category->description }}
        </p>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
                    <div class="caption">
                        <h3>King пицца, 35см.</h3>
                        <p>150 грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/1/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/mobiles/iphone_x_64" class="btn btn-default"
                            role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_5.jpg" alt="iPhone 5SE">
                    <div class="caption">
                        <h3>Гавайская пицца, 25см.</h3>
                        <p>85грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/4/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/pizzas/iphone_5se" class="btn btn-default"
                            role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/delongi.jpg" alt="Кофемашина DeLongi">
                    <div class="caption">
                        <h3>Мексиканская пицца, 35см.</h3>
                        <p>134грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/8/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/appliances/delongi" class="btn btn-default"
                            role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="http://laravel-diplom-1.rdavydov.ru/storage/products/moulinex.jpg" alt="Блендер Moulinex">
                    <div class="caption">
                        <h3>Двойная пепперони пицца, 30см.</h3>
                        <p>117грн.</p>
                        <p>
                            <a href="http://laravel-diplom-1.rdavydov.ru/basket/10/add" class="btn btn-primary" role="button">В корзину</a>
                            <a href="http://laravel-diplom-1.rdavydov.ru/appliances/moulinex" class="btn btn-default"
                            role="button">Подробнее</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
