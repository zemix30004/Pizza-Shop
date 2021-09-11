<?php

namespace App\Http\Controllers;

use App\Classes\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\CartRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function create()
    {
        return view('cart.place.create');
    }
    public function store(CartRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'phone' => 'required|numeric|min:9|max:20',
            'address' => 'required|min:6|max:255',
            'name' => 'required|min:3|max:255',
        ]);
    }
    public function cart()
    {
        $order = (new Cart())->getOrder();
        return view('cart', compact('order'));
    }

    public function cartConfirm(OrderRequest $request)
    {
        if ($request->get('cancel_order')) {
            session()->flash('success', __('cart.cancel_order'));
        } else {
            $email = Auth::check() ? Auth::user()->email : $request->email;
            if ((new Cart())->saveOrder($request->name, $request->phone, $request->address, $email)) {
                session()->flash('success', __('cart.your_order_confirmed'));
            } else {
                session()->flash('warning', __('cart.your_cant_order_more'));
            }
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
