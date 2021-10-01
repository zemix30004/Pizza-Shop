<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CategoryImport;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\CategoryExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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
     * @param \Illuminate\Http\Request $request
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
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("admin.categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.categories.form", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
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
     * @param \App\Models\Category $category
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
        $categories = Category::query()->get();
        if (empty($categories)) {
            return back();
        }

        $uploadPath = storage_path('uploads/');
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath);
        }

        $filename = $uploadPath . Str::uuid()->toString() . '.csv';
        $fp = fopen($filename, 'w');
        fputcsv($fp, ['name', 'code', 'description']);
        foreach ($categories as $category) {
            fputcsv($fp, [
                $category->name,
                $category->code,
                $category->description
            ]);
        }
        fclose($fp);

        return response()->download($filename, 'categories.csv');
    }

    public function categoryImport(Request $request)
    {
        $request->validate([
            'file' => 'required|max:10000|mimes:xls,xlsx,csv',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->path();

            if (($handle = fopen($path, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if ($data[0] === 'name') {
                        continue;
                    }
                    $name = $data[0];
                    $code = $data[1];
                    $description = $data[2];

                    $validator = Validator::make(['name' => $name], [
                        'name' => 'required|unique:categories|max:255',
                    ]);

                    if (!$validator->fails()) {
                        Category::create([
                            'name' => $name,
                            'description' => $description,
                            'code' => !empty($code) ? $code : Str::uuid()->toString()
                        ]);
                    }
                }
                fclose($handle);
            }
        }

        return back()->with('success', 'All good!');
    }

    public function import(Request $request)
    {
        Excel::import(new CategoryImport, $request->file('file'));
        return "Данные успешно импортированы!";
    }
}
