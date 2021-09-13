<div class="col">
    <div class="card shadow-sm">
        <img class="img-thumbnail" style="max-height: 200px" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->__('name') }}">

        <div class="card-body">
            <p class="card-title">{{ $product->__('name') }}</p>
            <p class="card-text">{{ $product->__('description') }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
{{--                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
{{--                    <button type="button" class="btn btn-sm btn-outline-secondary">Order</button>--}}
                    <form action="{{ route('cart-add', $product) }}" method="POST">
                        @if($product->isAvailable())
                            <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_cart')</button>
                        @else
                            @lang('main.not_available')
                        @endif
                        <a href="{{  route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}" class="btn btn-default"
                        role="button">@lang('main.more')</a>
                        @csrf
                    </form>
                </div>
                <small class="text-muted">{{ $product->price }} {{ App\Services\CurrencyConversion::getCurrencySymbol() }}.</small>
            </div>
        </div>
    </div>
</div>
