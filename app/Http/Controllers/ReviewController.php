<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    public function review()
    {
        return view('review');
    }
    public function ViewProduct($id)
    {
        $show = Product::findOrFail($id);
        $related = Product::where('category_id', $show->category_id)
            ->orderByRaw('RAND()')
            ->take(10)
            ->get();
        $reviews = Review::where('product_id', $show->id)->get();
        return view('viewproduct', compact('show', 'related', 'order', 'reviews'));
    }

    public function StoreReviewProduct(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'description' => 'required|min:10',
        ]);
        $addreview = new Review([
            'product_id' => $request['product_id'],
            'user_id' => Auth::user()->id,
            'rating' => $request['rating'],
            'description' => $request['description']
        ]);
        $addreview->save();
        Session::flash('success', 'thanks for adding review!');
        return redirect()->back();
    }

    // public function addReview($product_slug)
    // {
    //     $product = Product::where('slug', $product_slug)->where('status', '0')->first();

    //     if ($product) {

    //         $product_id = $product->id;
    //         $verified_purchase = Order::where('orders_user_id', Auth::id())
    //             ->join('orders_items', 'orders.id', 'orders_items.order_id');
    //         where('orders_items.prod_id', $product_id)->get();
    //         return view('review', compact('product', 'verified_purchase'));
    //     } else {
    //         return redirect()->back()->with('status', 'The link you followed was broken');
    //     }
    // }
}
