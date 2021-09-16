<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection
{
    // public function headings(): array
    // {
    //     return [
    //         'Category_id',
    //         'Name',
    //         'Code',
    //         'Description',
    //         'Image',
    //         'Price',
    //         'Size',
    //         'Is_spicy',
    //         'Is_veg',
    //         'Is_best_offer'
    // 'hit',
    // 'new',
    // 'recommend',
    // 'count',
    // 'name_en',
    // 'description_en'
    //     ];
    // }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all();
        // return collect(Product::getProduct());
    }
}
