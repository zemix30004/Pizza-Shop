<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $products = Product::paginate(3);
        return view('index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        $products = Product::where('category_id', $category->id);
        return view('category', compact('category'));
    }

    public function product($category, $product = null)
    {
        return view('product', ['product' => $product]);
    }
}
