@extends('layouts.new-master')

@section('title', __('main.product'))

@section('content')
        <h2>{{ $product->__('name') }}</h2>
        <h3>{{ $product->category->name }}</h3>
        <p>@lang('product.price'): <b>{{ $product->price }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</b></p>
        <img src="{{ asset('storage/' . $product->image) }}">
        <p>{{  $product->__('description') }}</p>
            @if($product->isAvailable())
            <form action="{{ route('cart-add', $product) }}" method="POST">
            <button type="submit" class="btn btn-success btn-sm" role="button">@lang('product.add_to_cart')</button>
            @csrf
        </form>
        <form action="{{ route('review', $product) }}" method="GET">
            <button type="submit" class="btn btn-primary btn-sm" role="button">@lang('product.add_review')</button>
        </form>
    @else
        <span>@lang('product.not_available')</span>
        <br>
        <span>@lang('product.tell_me'):</span>
        <div class="warning">
            @if($errors->get('email'))
                {!! $errors->get('email')[0] !!}
            @endif
        </div>
        <form method="POST" action="{{ route('subscription', $product) }}">
            @csrf
            <input type="text" name="email"></input>
            <button type="submit">@lang('product.subscribe')</button>
        </form>
    @endif
@endsection
