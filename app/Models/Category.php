<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use Translatable;

    // protected $table = "categories";

    // public static function getCategory()
    // {
    //     $records = DB::table('categories')->select('code', 'name', 'description', 'image', 'name_en', 'description_en')->get()->toArray();
    //     return $records;
    // }


    protected $fillable = ['code', 'name', 'description', 'image', 'name_en', 'description_en', 'count'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function isAvailable()
    {
        return !$this->trashed() && $this->count > 0;;
    }
}
