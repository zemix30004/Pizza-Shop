@extends('layouts.admin')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h2>Категории</h2>
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
                    Действия
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success btn-sm" type="button" href="{{ route('categories.show', $category) }}">Открыть</a>
                                <a class="btn btn-warning btn-sm" type="button" href="{{ route('categories.edit', $category) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger btn-sm" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- {{ $categories->links() }} --}}
        <a class="btn btn-success btn-sm" type="button"href="{{ route('categories.create') }}">Добавить категорию</a>
        <a class="btn btn-primary btn-sm" type="button" href="{{ route('categories.exportintocsv') }}">Экспорт</a>
    </div>
@endsection
