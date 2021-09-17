@extends('layouts.new-master')

@section('title', 'Пользователи')

@section('content')
    <div class="col-md-12">
        <h2>Пользователи/h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    ФИО
                </th>
                {{-- <th>
                    Телефон
                </th> --}}
                {{-- <th>
                    Адрес
                </th> --}}
                <th>
                    E-Mail
                </th>
                <th>
                    Время регистрации
                </th>
                <th>
                    Действия
                </th>
            </tr>
            {{-- @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->calculateFullSum() }} @lang('main.uah')</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success btn-sm" type="button"
                            @admin
                                href="{{ route('orders.show', $order) }}"
                            @else
                                href="{{ route('person.orders.show', $order) }}"
                            @endadmin

                        >Открыть</a>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{-- {{ $orders->links() }} --}}
    </div> --}}
@endsection
