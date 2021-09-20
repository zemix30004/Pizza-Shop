<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    public function headings(): array
    {
        return [
            'Category_id',
            'Name',
            'Code',
            'Description',
            'Image',
            'Price',
            'Size',
            'Is_spicy',
            'Is_veg',
            'Is_best_offer',
            'Hit',
            'New',
            'Recommend',
            'Count',
            'Name_en',
            'Description_en'
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Product::all();
        return collect(Product::getProduct());
    }
}
