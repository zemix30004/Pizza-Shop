<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CategoryImport;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Facades\Csv;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(6);
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $params = $request->all();
        unset($params["image"]);
        if ($request->has("image")) {
            $params["image"] = $request->file("image")->store("categories");
        }

        Category::create($params);
        return redirect()->route("admin.categories.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("admin.categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.categories.form", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $params = $request->all();
        unset($params["image"]);
        if ($request->has("image")) {
            Storage::delete($category->image);
            $params["image"] = $request->file("image")->store("categories");
        }
        $category->update($params);
        return redirect()->route("admin.categories.index");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("admin.categories.index");
    }

    public function exportInExcel()
    {
        return Excel::download(new CategoryExport, 'categorylist.xlsx');
    }

    public function exportInCSV()
    {
        return Excel::download(new CategoryExport, 'categorylist.csv');
    }

    public function categoryImport(Request $request)
    {
        dd($request);
        // $request->validate([
        //     'file' => 'required|max:10000|mimes:csv,xlsx',
        // ]);

        Excel::import(new CategoryImport, $request->file('file'));

        return back()->with('success', 'All good!');
    }
    // Session::flash('success', 'Данные успешно импортированы!');
    // return redirect()->route('categories.index');

    // public function import(Request $request)
    // {
    //     Excel::import(new CategoryImport, $request->file('file'));
    //     return "Данные успешно импортированы!";
    // }
    // public function categoryImport(Request $request)
    // {
    //     Excel::import(new CategoryImport, $request->file('files'));
    //     // (new CategoryImport)->import('categories.csv', null, \Maatwebsite\Excel\Excel::CSV);

    //     return redirect('/')->with('success', 'All good!');
    // }
}
