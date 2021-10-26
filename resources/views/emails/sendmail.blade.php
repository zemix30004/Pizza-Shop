{{-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/app.css" rel="stylesheet">
        <title>Отправка email</title>
</head> --}}
@extends('layouts.new-master')

@section('title', __('emails.sendmail'))

@section('content')
<div class="container">
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
</div>
@endsection
