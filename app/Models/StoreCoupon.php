<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCoupon extends Model
{
    use HasFactory;
    protected $fillable=['store_id','name','description','coupon_rate','start_date','end_date','image','code'];
    protected  $hidden = ['created_at','updated_at'];

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
}