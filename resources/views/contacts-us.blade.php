@extends('layouts.new-master')

@section('title', __('contact-us'))

@section('content')

<section class="py-5 text-center container">
<h2>@lang('main.contact_us')</h2>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3>Contact Us</h3>
                @if(Session::has('message'))
                <div class="alert alert-success" role="alert">{{ $Session::get('message') }}</div>
                @endif
                <form id="contactform" class="form-theme" method="POST" wire:submit.prevent="sendMessage" enctype="multipart/form-data">
                    <input type="text" placeholder="Name" name="name" id="name" wire:model="name" required="">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" placeholder="Phone" name="phone" id="phone" wire:model="phone" required>
                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" placeholder="Email" name="email" id="email" wire:model="email" required>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <textarea placeholder="Your Message" name="message" id="message" wire:model="message" required></textarea>
                    <input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
                    @error('message')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
