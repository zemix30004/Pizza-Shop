<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Category([
            'name' => $row['name'],
            'code' => $row['code'],
            'description' => $row['description'],
            'image' => $row['image'],
            'name_en' => $row['name_en'],
            'description_en' => $row['description_en'],
            'count' => $row['count'],
        ]);
    }
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1'
        ];
    }
}
