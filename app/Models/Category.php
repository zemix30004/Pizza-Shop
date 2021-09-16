<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use Translatable;

    protected $table = "categories";

    public static function getCategory()
    {
        $records = DB::table('categories')->select('code', 'name', 'description', 'image', 'name_en', 'description_en');
    }


    protected $fillable = ['code', 'name', 'description', 'image', 'name_en', 'description_en'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
