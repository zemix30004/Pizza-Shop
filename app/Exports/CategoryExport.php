<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
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
