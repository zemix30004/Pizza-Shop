<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Http\Requests\reviewRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function review()
    {
        return view('review');
    }
    // public function ViewProduct($id)
    // {
    //     $show = Product::findOrFail($id);
    //     $related = Product::where('category_id', $show->category_id)
    //         ->orderByRaw('RAND()')
    //         ->take(10)
    //         ->get();
    //     $reviews = Review::where('product_id', $show->id)->get();
    //     return view('viewproduct', compact('show', 'related', 'order', 'reviews'));
    // }

    // public function StoreReviewProduct(Request $request)
    // {
    //     $this->validate($request, [
    //         'rating' => 'required',
    //         'comment' => 'required|min:10',
    //     ]);
    //     $addreview = new Review([
    //         'product_id' => $request['product_id'],
    //         'user_id' => Auth::user()->id,
    //         'rating' => $request['rating'],
    //         'comment' => $request['comment']
    //     ]);
    //     $addreview->save();
    //     Session::flash('success', 'thanks for adding review!');
    //     return redirect()->back();
    // }
    public function adminReview(Request $request)
    {
        $reviews = Review::paginate(10);
        return view('admin.review', ['reviews' => $reviews], ['reviews' => $reviews['id']]);
    }

    public function ReviewSubmit(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'dignity' => 'required',
            'flaw' => 'required',
            'comment' => 'required'
        ]);

        $review = new Review([
            // 'user_id' => Auth::user()->id,
            'user_id' => $request['user_id'],
            'product_id' => $request['product_id'],
            'rating' => $request['rating'],
            'dignity' => $request['dignity'],
            'flaw' => $request['flaw'],
            'comment' => $request['comment']
        ]);

        $review->save();
        // Session::flash('success', 'Спасибо, что оставили отзыв!');
        return redirect()->back()->with('success', 'Спасибо, что оставили отзыв!');

        $review->user_id = $request->user_id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->dignity = $request->dignity;
        $review->flaw = $request->flaw;
        $review->comment = $request->comment;

        $review->save();

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
}
