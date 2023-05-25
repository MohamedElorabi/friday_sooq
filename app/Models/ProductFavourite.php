<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFavourite extends Model
{
    use HasFactory;
    protected $fillable=['product_id','user_id'];
    protected  $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function product()
    {
        return $this->belongsTo(StoreProduct::class,'product_id');
    }
}
