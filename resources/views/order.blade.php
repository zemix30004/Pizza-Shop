@extends('layouts.master')

@section('title', __('cart.place_order'))

@section('content')
    <h1>@lang('cart.approve_order'):</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>@lang('basket.full_cost'): <b>{{ $order->calculateFullSum() }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}</b></p>
            <form action="{{ route('cart-confirm') }}" method="POST">
                <div>
                    <p>@lang('cart.personal_data'):</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('cart.data.name'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('cart.data.phone'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="address" class="control-label col-lg-offset-3 col-lg-2">@lang('cart.data.address'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="address" id="address" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="email" class="control-label col-lg-offset-3 col-lg-2">@lang('cart.data.email'): </label>
                            <div class="col-lg-4">
                                <input type="text" name="email" id="email" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" name="approve_order" value="@lang('cart.approve_order')">
                    <input type="submit" class="btn btn-success" name="cancel_order" value="@lang('cart.cancel_order')">
                </div>
            </form>
        </div>
    </div>
@endsection
