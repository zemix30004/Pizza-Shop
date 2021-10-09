<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;
    public static function getContact()
    {
        $records = DB::table('contacts')->select('id', 'name', 'phone', 'email', 'message')->get()->toArray();
        return $records;
    }

    protected $fillable = ['id', 'name', 'phone', 'email', 'message'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
