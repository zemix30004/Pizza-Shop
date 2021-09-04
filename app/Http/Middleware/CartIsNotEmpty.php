<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class CartIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $orderId = session('orderId');

        if (!is_null($orderId) && Order::getFullSum() > 0) {
            return $next($request);
        }
        session()->forget('orderId');
        session()->flash('warning', __('cart.cart_is_empty'));
        return redirect()->route('index');
    }
}
