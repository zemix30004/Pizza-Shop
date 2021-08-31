<p>@lang('mail.order_created.dear') {{ $name }}</p>

<p>@lang('mail.order_created.your_order') {{ $fullSum }} @lang('mail.order_created.created')</p>

<table>
    <tbody>
        @foreach ($order->products as $product)
        <tr>
            <td>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                    <img height="56px" src="{{ Storage::url($product->image) }}">
                    {{ $product->__('name') }}
                </a>
            </td>
            <td><span class="badge">{{ $product->pivot->count }}</span>
                <div class="btn-group form-inline">
                    <style>div.form-inline form{display: inline;}</style>
                    {!! $product->__('description') !!}
                </div>
            </td>
            <td>{{ $product->price }} @lang('main.grn').</td>
            <td>{{ $product->getPriceForCount() }} @lang('main.grn').</td>
        </tr>
        @endforeach
    </tbody>
</table>
