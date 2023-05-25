<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_id','price','quantity'];
    protected  $hidden = ['created_at','updated_at'];

    public function order()
    {
        return $this->belongsTo(StoreOrder::class,'order_id');
    }
    public function product()
    {
        return $this->belongsTo(StoreProduct::class,'product_id');
    }
}
