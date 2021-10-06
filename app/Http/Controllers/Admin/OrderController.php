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

    // public function orderCancel(OrderRequest $request)
    // {
    //     $this->cart->delete();
    //     return redirect()->route('auth.orders.index');
    // }
    // public function cancelOrder(OrderRequest $request)
    // {
    //     dd($request->all());
    //     if ($request->get('cancelorder')) {
    //         session()->flash('order_message', 'Order has been canceled!');
    //         return redirect()->route('admin.orders.index');
    //     }
    // }
    // }
    // }
    // public function destroy($id)
    // {
    //     $order = Order::find($id);
    //     $order->delete();
    //     return redirect()->back()->withSuccess('Заказ был успешно удален!');
    // }
    // public function cancelOrder(Order $order)
    // {
    //     $order->delete(['order' => $order->id]);
    //     // $orderId->delete('orderId');
    //     // $orderId = Order::cancel($this->orderId);
    //     return redirect(route('admin.orders.index'))->withSuccess('Заказ был успешно отменен!');
    // }
    public function orderTest($order_id)
    {
        $order = Order::where('id', $order_id);
        $order->delete();
        return redirect(route('admin.orders.index'))->withSuccess('Заказ был успешно отменен!');
    }



    // $order = Order::find($this->order);
    // $order->cancel();
    // $order->status = "canceled";
    // $order->save();
    // session()->flash('order_message', 'Order has been canceled!');
    // $this->cart->delete();
    // return redirect()->route('cart');

}
