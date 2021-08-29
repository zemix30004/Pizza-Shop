<p>Уважаемый {{ $name }}</p>

<p>Ваш заказ на сумму {{ $fullSum }} создан</p>

<table>
    <tbody>
        @foreach ($order->product as $product)
        <tr>
            <td>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                    <img height="56px" src="{{ Storage::url($product->image) }}">
                    {{  $product->name }}
                </a>
            </td>
            <td><span class="badge">{{ $product->pivot->count }}</span>
                <div class="btn-group form-inline">
                    <style>div.form-inline form{display: inline;}</style>
                    {{ $product->description  }}
                </div>
            </td>
            <td>{{  $product->price }} грн.</td>
            <td>{{  $product->getPriceForCount() }} грн.</td>
        </tr>
        @endforeach
    </tbody>
</table>
