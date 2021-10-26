@extends('layouts.new-master')

@section('title', __('contact'))

@section('content')

<section class="py-5 text-center container">
<h2>@lang('main.contact_us')</h2>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3>Свяжитесь с нами здесь</h3>
            </div>
            <div class="card-body">
                @if(Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                @endif
                <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input type="text" name="name" class="form-control" />
                        {{ $errors->first('name') }}
                        @if ($errors->has('name'))
                        <small class="form-text invalid-feedback">
                        <style>
                        .invalid-feedback {
                        display: : block;
                        }
                        </style></small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон:</label>
                        <input type="text" name="phone" class="form-control" />
                        {{ $errors->first('phone') }}
                        @if ($errors->has('phone'))
                        <small class="form-text invalid-feedback"></small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Электронная почта:</label>
                        <input type="text" name="email" class="form-control" />
                        {{ $errors->first('email') }}
                        @if ($errors->has('email'))
                        <small class="form-text invalid-feedback">{</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message">Сообщение:</label>
                        <textarea name="message" class="form-control"></textarea>
                        {{ $errors->first('message') }}
                        @if ($errors->has('message'))
                        <small class="form-text invalid-feedback alert alert-danger"></small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Далее</button>
                </form>
                {{-- @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                    @endforeach
                </div>
                @endif --}}
                @if(session()->has("message"))
                <div class="alert alert-success">
                    {{ session()->get("message") }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</section>
@endsection
<!-- <div class="container">
<div class="row">
<form method="POST" action="">
@csrf
        @if(Session::has('mess'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('mess') }}</p>
        @endif

    <div class="form-group">
        <input id="message" type="text" class="form-control" name="message" required >
    </div>

     <div class="form-group">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>
</div>
</div> -->
