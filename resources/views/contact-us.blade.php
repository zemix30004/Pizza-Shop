@extends('layouts.new-master')

@section('title', __('contact-us'))

@section('content')

<section class="py-5 text-center container">
<h2>@lang('main.contact_us')</h2>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                Обратная связь
            </div>
            <div class="card-body">
                @if(Session::has('message_sent'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message_sent') }}
                </div>
                @endif
                <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" name="имя" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" name="телефон" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <input type="text" name="сообщение" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button></button>
                </form>
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                    @endforeach
                </div>
                @endif
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
