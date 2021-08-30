@extends('layouts.master')

@section('title', __('cart.cart'))

@section('content')
    <h1>@lang('cart.cart')</h1>
    <p>@lang('cart.ordering')</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>@lang('basket.name')</th>
                <th>@lang('basket.count')</th>
                <th>@lang('basket.price')</th>
                <th>@lang('basket.cost')</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order->products()->with('category')->get() as $product)
            <tr>
                <td>
                    <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                        <img height="56px" src="{{ Storage::url($product->image) }}">
                        {{  $product->name }}
                    </a>
                </td>
                <td><span class="badge">{{ $product->pivot->count }}</span>
                    <div class="btn-group form-inline">
                        <style>div.form-inline form{display: inline;}</style>
                                <form action="{{ route('cart-remove', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-danger" href=""><span
                                    class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                                <form action="{{ route('cart-add', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-success" href=""><span
                                    class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                    </div>
                </td>
                <td>{{  $product->price }} @lang('main.grn')</td>
                <td>{{  $product->getPriceForCount() }} грн.</td>
            </tr>
            @endforeach

            <tr>
                <td colspan="3">@lang('cart.full_cost'):</td>
                <td>{{ $order->getFullSum() }} @lang('main.grn').</td>
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{ route ('cart-place') }}">@lang('cart.place_order')</a>
        </div>
    </div>
@endsection
