    {{-- <?php
    var_dump($POST);
    $pdo = new PDO("pgsql:host=localhost;dbname=Pizza-Shop", "postgres", "vagon1977");
    var_dump($pdo);
    ?> --}}


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
                    Количество
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
                    <td>{{ $category->count }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success btn-sm" type="button" href="{{ route('admin.categories.show', $category) }}">Открыть</a>
                                <a class="btn btn-warning btn-sm" type="button" href="{{ route('admin.categories.edit', $category) }}">Редактировать</a>
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
        <a class="btn btn-success btn-sm" type="button"href="{{ route('admin.categories.create') }}">Добавить категорию</a>
        <a class="btn btn-primary btn-sm" type="button" href="{{ route('admin.categories.exportincsv') }}">Экспорт</a>
<form method="POST" enctype="multipart/form-data" action="{{ route('admin.categories.categoryimport') }}">

    <div class="form-group">
        <label for="file">Выберите CSV</label>
        <input type="file" name="file" accept=".csv" class="form-control">
        {{-- {{ $errors->first('file') }} --}}
        @csrf
    </div>
    <button type="submit" name="submit" class="btn btn-secondary">Импорт</button>
</form>
    </div>
@endsection
