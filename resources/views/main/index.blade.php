@extends('layouts.new-master')

@section('title', __('main.title'))

@section('content')
        <h2>@lang('main.all_products')</h2>

        @include('main.search')
        @if(count($products))
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($products as $product )
                @include('products.new-card', compact('product'))
            @endforeach
        </div>
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
          <div class="col-sm-12 text-right text-center-xs">
            {{ $products->appends(['s' => request()->s])->links() }}
                 @else
       <p class="text alert alert-danger" >Таких продуктов не найдено</р>
        </div>
@endif
@endsection
