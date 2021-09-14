@extends('layouts.new-master')

@section('title', __('main.all_categories'))

@section('content')

        @foreach($categories as $category)
        <div class="panel">
            <a href="{{ route('category', $category->code) }}">
                <img src="{{ asset('storage/' . $category->image) }}">
                <h2>{{ $category->__('name') }}</h2>
            </a>
            <p>
                {{ $category->__('description') }}
            </p>
        </div>
        @endforeach

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>

@endsection
