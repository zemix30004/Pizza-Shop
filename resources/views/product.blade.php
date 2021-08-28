@extends('layouts.master')

@section('title', 'Товар')

@section('content')

        <h1>King Пицца, 35см.</h1>
        <h2>{{ $product }}</h2>
        <p>Цена: <b>150 грн.</b></p>
        <img src="{{ Storage::url($product->image) }}">
        <p>Вкуснейшая пица сезона</p>
        <a class="btn btn-success" href="">Добавить в корзину</a>
@endsection
