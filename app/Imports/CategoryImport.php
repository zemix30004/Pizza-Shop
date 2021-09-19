<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Category([
            'code' => $row['code'],
            'name' => $row['name'],
            'description' => $row['description'],
            'image' => $row['image'],
            'name_en' => $row['name_en'],
            'description_en' => $row['description_en'],
            'count' => $row['count'],
        ]);
    }
}
