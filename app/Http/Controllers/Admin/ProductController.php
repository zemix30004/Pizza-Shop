<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view("auth.products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view("auth.products.form", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $params = $request->all();

        unset($params["image"]);
        if ($request->has("image")) {
            $params["image"] = $request->file("image")->store("products");
        }

        Product::create($params);
        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("auth.products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view("auth.products.form", compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $params = $request->all();
        unset($params["image"]);
        if ($request->has("image")) {
            Storage::delete($product->image);
            $params["image"] = $request->file("image")->store("products");
        }

        foreach (["new", "hit", "recommend"] as $fieldName) {
            if (!isset($params[$fieldName])) {
                $params[$fieldName] = 0;
            }
        }


        $product->update($params);
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index");
    }

    public function addProduct()
    {
        $products = [
            [
                "category_id" => 1,
                "name" => "King пицца",
                "code" => "king_pizza",
                "description" => "Вкуснейшая пица сезона",
                "image" => "products/Королевская пицца.jpg",
                "price" => "150.00",
                "size" => "35.00",
                "is_spicy" => "true",
                "is_veg" => "true",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 1,
                "name" => "Мексиканская пицца",
                "code" => "mexican_pizza",
                "description" => "Самая пикантная пицца сезона",
                "image" => "products/Мексиканская пицца.jpg",
                "price" => "134.00",
                "size" => "35.00",
                "is_spicy" => "true",
                "is_veg" => "false",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 1,
                "name" => "Двойная Пепперони пицца",
                "code" => "double_pepperony_pizza",
                "description" => "Очень острая пицца в нашем ассортименте",
                "image" => "products/Двойная Пепперони.jpg",
                "price" => "117.00",
                "size" => "30.00",
                "is_spicy" => "true",
                "is_veg" => "true",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 2,
                "name" => "Круассан большой",
                "code" => "cruassan_big",
                "description" => "Ну очень большой круассан",
                "image" => "products/Круассан большой.jpg",
                "price" => "80.00",
                "size" => "35.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 2,
                "name" => "Биг Wings",
                "code" => "big_wings",
                "description" => "Нежные хрустящие крылышки",
                "image" => "products/Хрустящие крылышки.jpg",
                "price" => "115.00",
                "size" => "450.00",
                "is_spicy" => "true",
                "is_veg" => "false",
                "is_best_offer" => "false",
            ],
            [
                "category_id" => 2,
                "name" => "Картофельные оладьи",
                "code" => "potato_pancakes",
                "description" => "Вкусные оладьи со вкусом картофеля",
                "image" => "products/Картофельные оладьи.jpg",
                "price" => "48.00",
                "size" => "230.00",
                "is_spicy" => "false",
                "is_veg" => "true",
                "is_best_offer" => "false",
            ],
            [
                "category_id" => 2,
                "name" => "Жареный картофель",
                "code" => "baby_potato",
                "description" => "Самый обоажаемый жареный картофель",
                "image" => "products/Жареный картофель.jpg",
                "price" => "40.00",
                "size" => "160.00",
                "is_spicy" => "true",
                "is_veg" => "true",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 3,
                "name" => "Сок Rich Lemon",
                "code" => "juice_rich_lemon",
                "description" => "Освежающий лимонный сок от Rich",
                "image" => "products/Сок Rich Lemon.jpg",
                "price" => "35.00",
                "size" => "1.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 3,
                "name" => "Coca-Cola",
                "code" => "coca_cola",
                "description" => "Бодрящий приятный на вкус напиток",
                "image" => "products/Coca-Cola.jpg",
                "price" => "60.00",
                "size" => "2.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 3,
                "name" => "Узвар грушево-яблочный",
                "code" => "uzvar_pear_apple",
                "description" => "Сваренный из настоящих фруктов",
                "image" => "products/Узвар грушево-яблочный.jpg",
                "price" => "40.00",
                "size" => "1.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "false",
            ],
            [
                "category_id" => 3,
                "name" => "Bonaqua",
                "code" => "bon_aqua",
                "description" => "Освежающая минеральная вода",
                "image" => "products/bonaqua.jpg",
                "price" => "32.00",
                "size" => "1.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "false",
            ],
            [
                "category_id" => 1,
                "name" => "Пицца с морепродуктами",
                "code" => "pizza_with_seafood",
                "description" => "Пикантная пицца с морским вкусом",
                "image" => "products/Пицца с морепродуктами.jpg",
                "price" => "120.00",
                "size" => "1.00",
                "is_spicy" => "true",
                "is_veg" => "false",
                "is_best_offer" => "false",
            ],
            [
                "category_id" => 4,
                "name" => "Ягодный пудинг",
                "code" => "berry_pudding",
                "description" => "Со вкусом настоящих лесных ягод",
                "image" => "products/Ягодный пудинг.jpg",
                "price" => "50.00",
                "size" => "25.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "false",
            ],
            [
                "category_id" => 4,
                "name" => "Шоколадные трюфели",
                "code" => "chocolate truffles",
                "description" => "Шедевр шоколадного искусства",
                "image" => "products/Шоколадные трюфели.jpg",
                "price" => "60.00",
                "size" => "100.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 4,
                "name" => "Торт Пина Колада",
                "code" => "pie_Pina_Colada",
                "description" => "Незабываемый карибский вкус настоящего десерта",
                "image" => "products/Торт Пина Колада.jpg",
                "price" => "130.00",
                "size" => "30.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "true",
            ],
            [
                "category_id" => 4,
                "name" => "Мороженое Снежок",
                "code" => "ice_cream_snowball",
                "description" => "Тает во рту, а не в руках",
                "image" => "products/Мороженое Снежок.jpg",
                "price" => "30.00",
                "size" => "5.00",
                "is_spicy" => "false",
                "is_veg" => "false",
                "is_best_offer" => "true"
            ],
        ];
        Product::insert($products);
        return "Records are inserted";
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ProductExport, "productlist.xlsx");
    }

    public function exportIntoCSV()
    {
        return Excel::download(new ProductExport, "productlist.csv");
    }
}
 // public function productExport()
    // {
    //     return Excel::download(new ProductsExport, "products-collection.csv");
    // }
