<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;


class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::active()->paginate(6);
        return view('auth.orders.index', compact('orders'));
    }
    public function store(OrderRequest $request)
    {
        $request->validate([
            'code' => 'required|min:3|max:255|unique:products,code',
            'name' => 'required|alpha|min:2|max:255',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:0',
        ]);
    }

    public function show(Order $order)
    {
        $products = $order->products()->withTrashed()->get();
        return view('auth.orders.show', compact('order', 'products'));
    }
}
