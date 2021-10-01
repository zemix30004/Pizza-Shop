<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];

    const STATUS_NEW = 0;
    const STATUS_APPROVED = 1;
    const STATUS_CANCELLED = 2;

    protected $statuses = [
        self::STATUS_NEW => 'Новый',
        self::STATUS_APPROVED => 'Подтверджен',
        self::STATUS_CANCELLED => 'Отменен',
    ];

    // $this->title_status
    public function getTitleStatusAttribute() {
        return $this->statuses[$this->status];
    }


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function calculateFullSum()
    {

        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public static function eraseOrderSum()
    {
        session()->forget('full_order_sum');
    }

    public static function changeFullSum($changeSum)
    {
        $sum = self::getFullSum() + $changeSum;
        session(['full_order_sum' => $sum]);
    }

    public static function getFullSum()
    {
        return session('full_order_sum', 0);
    }

    public function saveOrder($name, $phone, $address)
    {
        if ($this->status == self::STATUS_NEW) {
            $this->name = $name;
            $this->phone = $phone;
            $this->address = $address;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }
}
