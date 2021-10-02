@extends('layouts.new-master')

@section('title', 'Продукты')

@section('content')
    <div class="col-md-12">
        <h2>Продукты</h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Категория
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Количество
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->count }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success btn-sm" type="button" href="{{ route('admin.products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning btn-sm" type="button" href="{{ route('admin.products.edit', $product) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger btn-sm" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- {{ $products->links() }} --}}
        <a class="btn btn-success btn-sm" type="button" href="{{ route('admin.products.create') }}">Добавить продукт</a>
        <a class="btn btn-primary btn-sm" type="button" href="{{ route('admin.products.exportintocsv') }}">Экспорт</a>
    </div>
@endsection

