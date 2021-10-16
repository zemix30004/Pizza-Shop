<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductsFilterRequest;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Review;
use App\Models\Subscription;
use App\Services\CurrencyConversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $productsQuery = Product::with('category');

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }

        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field();
            }
        }
        $products = $productsQuery->paginate(6)->withPath("?" . $request->getQueryString());
        return view('main.index', compact('products'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }

    public function product($category, $productCode)
    {
        $product = Product::withTrashed()->byCode($productCode)->firstOrFail();
        return view('product', compact('product'));
    }

    public function subscribe(SubscriptionRequest $request, Product $product)
    {

        Subscription::create([

            'email' => $request->email,
            'product_id' => $product->id,
        ]);
        return redirect()->back()->with('success', __('product.we_will_update'));
    }
    // public function contacts()
    // {
    //     return view('contacts');
    // }
    // public function contacts_check(Request $request)
    // {
    //     $valid = $request->validate([
    //         'name' => 'reqiured|min:2|max:20',
    //         'phone' => 'required|number|min:7|max:20',
    //         'email' => 'reqiured|min:4|max:100',
    //         'message' => 'required|min:15|max:500'
    //     ]);
    //     $contacts = new Contacts();
    //     $contacts->name = $request->input('name');
    //     $contacts->phone = $request->input('phone');
    //     $contacts->email = $request->input('email');
    //     $contacts->message = $request->input('message');

    //     $contacts->save();

    //     return redirect()->route('contacts');
    // }

    public function changeLocale($locale)
    {
        $availableLocales = ['ru', 'en'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }

    public function changeCurrency($currencyCode)
    {
        $currency = Currency::byCode($currencyCode)->firstOrFail();
        session(['currency' => $currency->code]);
        return redirect()->back();
    }

    // public function search(Request $request)
    // {
    //     $name = $request->name;
    //     $products = Product::where('name', "LIKE", "%$name%")->orWhere('id', "LIKE", "%$name%")->get();
    //     // $categories = Category::where('isVisiable', '=', 1)->get();
    //     return view('index', [
    //         'products' => $products,
    //         // 'categories' => $categories,
    //     ]);
    // }
    public function search(Request $request)
    {
        $s = $request->s;
        $products = Product::where('name', "LIKE", "%{$s}%")->orWhere('id', "LIKE", "%$s%")->paginate(1);
        $categories = Category::get();
        $category = Category::get();
        return view('main.index', [
            'products' => $products,
            'categories' => $categories,
            'category' => $category
        ]);
    }
    public function review()
    {
        return view('review');
    }

    public function reviewProduct()
    {
        return $this->hasOne(Review::class, 'product_item_id');
    }
}
