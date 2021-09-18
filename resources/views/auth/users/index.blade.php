@extends('layouts.new-master')

@section('title', 'Пользователи')

@section('content')
    <div class="col-md-12">
        <h2>Пользователи</h2>
        {{-- @if(session()->has('success'))
        <p class="alert alert-success">{{ session()->get('success') }}</p>
    @endif --}}
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Email
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                <a class="btn btn-success btn-sm" type="button" href="{{ route('users.show', $user) }}">Открыть</a>
                                <a class="btn btn-warning btn-sm" type="button" href="{{ route('users.edit', $user) }}">Редактировать</a>
                                {{-- <a class="btn btn-primary btn-sm" type="button" href="{{ route('users.update_token', $user) }}">Обновить токен</a> --}}
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger btn-sm" type="submit" value="Удалить"></form>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
 {{ $users->links() }}
<a class="btn btn-success" type="button" href="{{ route('users.create') }}">Добавить пользователя</a>
{{-- <a class="btn btn-primary btn-sm" type="button" href="{{ route('users.exportintocsv') }}">Экспорт</a> --}}
    </div>
@endsection
