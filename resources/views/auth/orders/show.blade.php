@extends('layouts.admin')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h2>Заказ №{{ $order->id }}</h2>
                    <p>Статус: <b>{{ $order->title_status }}</b></p>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер телефона: <b>{{ $order->phone }}</b></p>
                    <p>Адрес: <b>{{ $order->address }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th>Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product',[$product->category->code, $product->code]) }}">
                                        <img height="56px"
                                            src="{{ asset('storage/' . $product->image) }}">
                                        {{ $product->name }}
                                    </a>
                                    <td>{{ $product->count }}</td>
                                    <td>{{ $product->price }} @lang('main.uah')</td>
                                    <td>{{ $product->getPriceForCount()}} @lang('main.uah')</td>
                                </td>
                                <td><span class="badge">1</span></td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Общая стоимость:</td>
                            <td>{{ $order->calculateFullSum() }} @lang('main.uah')</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="btn">
        {{-- <a class="btn btn-danger btn-sm" href="{{('/orders/{order}/cancelorder') }}">@lang('cart.cancel_order')</a> --}}
<form action="{{('{order}/cancelorder') }}" method="POST" style="display: inline-block">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-danger btn-sm delete-btn">Отменить заказ
            <i class="fas fa-trash"></i></button>
    </form>
                {{-- <form action="{{ route('admin.destroy', $order->id) }}" method="DELETE" style="display: inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete
            <i class="fas fa-trash"></i></button>
    </form> --}}

{{--        <form action="">--}}
{{--            <input type="submit" class="btn btn-danger btn-sm" name="cancel_order" value="@lang('cart.cancel_order')">--}}
{{--        </form>--}}
    </div>
@endsection

