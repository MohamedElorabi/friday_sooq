<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname','email','phone','name','description','user_id'
    ];

    protected $appends = ['image'];


    public function images(){
        return $this->hasMany(OrderProductImage::class,'order_product_id');
    }


    public function getImageAttribute()
    {
    	$ad=OrderProductImage::where('order_product_id',$this->id)->first();
    	if (is_null($ad)) {
            return url('storage/ad/default.png');
        }
        $image = $ad->image;        
        return $image;
    }

    public function getActiveAtAttribute(){
        if($this->attributes['active_at'] != null){
            return Carbon::parse($this->attributes['active_at'])->diffForHumans();
        }else{
           return null;
        }
    }
    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
