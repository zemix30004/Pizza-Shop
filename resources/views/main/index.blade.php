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

       {{-- {{ $products->links() }} --}}
@endsection
