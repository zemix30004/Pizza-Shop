@extends('layouts.new-master')

@section('title', __('main.title'))

@section('content')
        <h1>@lang('main.all_products')</h1>

        @include('main.search')

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($products as $product )
                @include('products.new-card', compact('product'))
            @endforeach
        </div>
       {{ $products->links() }}
@endsection
