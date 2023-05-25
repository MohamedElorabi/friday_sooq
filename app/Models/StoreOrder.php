<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOrder extends Model
{
    use HasFactory;
    protected $fillable = ['store_id','user_id','address_id','coupon_id','total','sub_total','shipping_cost'];
    protected  $hidden = ['updated_at'];

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function address()
    {
        return $this->belongsTo(UserAddress::class,'user_id');
    }
    public function coupon()
    {
        return $this->belongsTo(StoreCoupon::class,'coupon_id');
    }
}
