<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders->active()->paginate(6);
        return view("auth.orders.index", compact("orders"));
    }

    public function show(Order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }
        return view('auth.orders.show', compact('order'));
    }
    public function cancelOrder(OrderRequest $request)
    {
        // dd($request->all());
        if ($request->get('cancel_order')) {
            session()->flash('order_message', 'Order has been canceled!');
            return redirect()->route('admin.orders.index');
        }
    }
}
