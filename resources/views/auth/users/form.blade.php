@extends('layouts.admin')

@isset($user)
    @section('title', 'Редактировать пользователя ' . $user->name)
@else
    @section('title', 'Добавить пользователя')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($user)
            <h2>Редактировать пользователя <b>{{ $user->name }}</b></h2>
                @else
                    <h2>Добавить пользователя</h2>
                @endisset
                <form method="POST" enctype="multipart/form-data"
                        @isset($user)
                        action="{{ route('users.update', $user) }}"
                        @else
                        action="{{ route('users.store') }}"
                    @endisset
                >
                    <div>
                        @isset($user)
                            @method('PUT')
                        @endisset
                        @csrf
                        <div class="input-group row">
                            <label for="name" class="col-sm-2 col-form-label">Название: </label>
                            <div class="col-sm-6">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="name" id="name"
                                    value="@isset($user){{ $user->name }}@endisset">
                            </div>
                        </div>
                            <br>
                            <div class="input-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email: </label>
                                <div class="col-sm-6">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="@isset($user){{ $user->email }}@endisset">
                                </div>
                            </div>
                        <button class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
@endsection
