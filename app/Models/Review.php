<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    protected $table = "reviews";

    // public function productItem()
    // {
    //     return $this->belongsTo(ProductItem::class);
    // }
    public static function getReview()
    {
        $records = DB::table('reviews')->select('id', 'user_id', 'product_id', 'rating', 'dignity', 'flaw', 'comment')->get()->toArray();
        return $records;
    }

    protected $fillable = ['id', 'user_id', 'product_id', 'rating', 'dignity', 'flaw', 'comment'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function review()
    {
        return $this->belongsToMany(Reviews::class);
    }

    public function currentUserHasSubmittedReview()
    {
        $countOfReviews = $this->reviews()
            ->where('user_id', Auth::user()->id)
            ->where('product_id', $this->id)
            ->get();

        return ($countOfReviews > 1 ? true : false);
    }
    // protected $fillable = ['kategori_id','nama_product','deskripsi','harga','pict','stok','review','id_kios'];

    // public function kios()
    // {
    //     return $this->belongsTo(Kios::class,'id_kios');
    // }

    // public function order()
    // {
    //     return $this->belongsTo(Orders::class,'id','product_id');
    // }
}
