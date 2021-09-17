@extends('layouts.admin')

@section('title', 'Поставщик ' . $user->name)

@section('content')
    <div class="col-md-12">
        <h2>Пользователь {{ $user->name }}</h2>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $user->email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
