<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $order = (new Cart())->getOrder();
        return view('cart', compact('order'));
    }

    public function cartConfirm(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;
        if ((new Cart())->saveOrder($request->name, $request->phone, $request->address, $email)) {
            session()->flash('success', __('cart.your_order_confirmed'));
        } else {
            session()->flash('warning', __('cart.your_cant_order_more'));
        }
        Order::eraseOrderSum();
        return redirect()->route('index');
    }

    public function cartPlace()
    {
        $cart = new Cart();
        $order = $cart->getOrder();
        if (!$cart->countAvailable()) {
            session()->flash('warning', __('cart.you_cant_order_more'));
            return redirect()->route('cart');
        }
        return view('order', compact('order'));
    }

    public function cartAdd(Product $product)
    {
        $result = (new Cart(true))->addProduct($product);
        if ($result) {
            session()->flash('success', __('cart.added') . $product->name);
        } else {
            session()->flash('warning', $product->name . $product->name . __('cart.not_available_more'));
        }
        return redirect()->route('cart');
    }

    public function cartRemove(Product $product)
    {
        (new Cart())->removeProduct($product);

        session()->flash('warning', __('cart.removed') . $product->name);

        return redirect()->route('cart');
    }
}
