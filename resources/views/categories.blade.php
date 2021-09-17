@extends('layouts.new-master')

@section('title', __('main.categories'))

@section('content')
<h2>@lang('main.categories')</h2>
        @foreach($categories as $category)
        <div class="panel">
            <a href="{{ route('category', $category->code) }}">
                <img src="{{ asset('storage/' . $category->image) }}">
                <h3>{{ $category->__('name') }}</h3>
            </a>
            <p>
                {{ $category->__('description') }}
            </p>
        </div>
        @endforeach
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Предыдущая</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Следующая</a>
              </li>
            </ul>
          </nav> --}}

@endsection
