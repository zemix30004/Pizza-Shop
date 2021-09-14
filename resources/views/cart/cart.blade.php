@extends('layouts.new-master')

@section('title', __('cart.cart'))

@section('content')
    <h1>@lang('cart.cart')</h1>
    <p>@lang('cart.ordering')</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>@lang('cart.name')</th>
                <th>@lang('cart.count')</th>
                <th>@lang('cart.price')</th>
                <th>@lang('cart.cost')</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order->products()->with('category')->get() as $product)
            <tr>
                <td>
                    <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                        <img height="60px" src="{{ asset('storage/' . $product->image) }}">
                        {{  $product->__('name') }}
                    </a>
                </td>
                        <div class="btn-group form-inline">
                    <style>div.form-inline form{display: inline;}</style>
                    <form action="{{ route('cart-remove', $product) }}" method="POST">
                        <button type="submit" class="btn btn-danger btn" href=""><span
                        class="glyphicon glyphicon-minus" aria-hidden="true">-</span></button>
                        @csrf
                    </form>
                    <form action="{{ route('cart-add', $product) }}" method="POST">
                        <button type="submit" class="btn btn-success btn" href=""><span
                        class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                        @csrf
                    </form>
                    </div>
                <td>{{ $product->pivot->count }}
                </td>
                <td>{{  $product->price }} @lang('main.uah')</td>
                <td>{{ $order->getFullSum() }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">@lang('cart.full_cost'):</td>
                <td>{{ $order->getFullSum() }} @lang('main.uah')</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route ('cart-place') }}">@lang('cart.place_order')</a>
        </div>
    </div>
@endsection
