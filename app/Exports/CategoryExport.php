<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{

    public function headings(): array
    {
        return [
            'Name',
            'Code',
            'Description',
            'Image',
            'Name_en',
            'Description_en',
            'Count',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Category::all();
        return collect(Category::getCategory());
    }
}
