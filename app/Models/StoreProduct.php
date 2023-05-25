<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken;
use DB;

class StoreProduct extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar','name_en','desc_ar','desc_en','quantity','price','sale_price','store_id','store_category_id','views','shipping_cost'];
    protected  $hidden = ['created_at','updated_at'];
    protected $appends = ['image','favouried'];
    
    public function category()
    {
        return $this->belongsTo(ٍStoreCategory::class,'category_id');
    }
    public function images(){
        return $this->hasMany(StoreProductImage::class,'product_id');
    }

    public function getImageAttribute()
    {
    	$ad=StoreProductImage::where('product_id',$this->id)->first();
    	if (is_null($ad)) {
            return storage_path('app/default.png');
        }
        $image = $ad->image;
        return $image;
    }
    public function getFavouriedAttribute()
    {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id; // !!!THIS ID WE CAN USE TO GET DATA OF YOUR USER!!!
            $fav = ProductFavourite::where('user_id',$user_id)->where('product_id',$this->id)->first();
            if(!$fav){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
}
