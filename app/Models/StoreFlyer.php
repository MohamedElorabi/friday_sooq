<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreFlyer extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar','name_en','store_id','type','expire_date','file','views'];

    protected  $hidden = ['created_at','updated_at'];
    protected $appends = ['image'];


    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }


    public function images(){
        return $this->hasMany(StoreFlyerImage::class,'flyer_id');
    }

    public function getImageAttribute()
    {
    	$ad=StoreFlyerImage::where('flyer_id',$this->id)->first();
    	if (is_null($ad)) {
            return url('storage/storeflyer/default.png');
        }
        else{
            return url('storage/storeflyer/').'/'.$ad->attributes['image'];
        }
        
        $image=$ad->image;   
        return $image;
    }
    
    public function getExpireDatetribute(){
        if($this->attributes['expire_date'] != null){
            return Carbon::parse($this->attributes['expire_date'])->diffForHumans();
        }else{
           return null;
        }
    }
    

}
