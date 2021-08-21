@extends('master')

@section('title', 'Товар')

@section('content')
    <div class="starter-template">
        <h1>King Пицца, 35см.</h1>
        <h2>{{ $product }}</h2>
        <p>Цена: <b>150 грн.</b></p>
        <img src="img/King Pizza.jpg">
        <p>Вкуснейшая пица сезона</p>
        <a class="btn btn-success" href="http://laravel-diplom-1.rdavydov.ru/basket/1/add">Добавить в корзину</a>
    </div>
@endsection
