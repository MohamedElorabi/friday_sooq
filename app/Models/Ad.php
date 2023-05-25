<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;
use Laravel\Sanctum\PersonalAccessToken;
use DB;

class Ad extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $fillable = [
        'name','desc','mobile','user_name','price','user_id','country_id','city_id','town_id','category_id','sub_category_id','active','whatsapp','call','active_at','slug','special_at','special_package','special','link','reason','views','lat','lng'
    ];

    protected $appends = ['favouried','image'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function details(){
        return $this->hasMany(AdOption::class,'ad_id');
    }
    public function images(){
        return $this->hasMany(AdImage::class,'ad_id');
    }
    public function favourites(){
        return $this->hasMany(Favourite::class,'ad_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function town()
    {
        return $this->belongsTo(Town::class,'town_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(AdComment::class,'ad_id');
    }

    public function getImageAttribute()
    {
    	$ad=AdImage::where('ad_id',$this->id)->first();
    	if (is_null($ad)) {
            return url('storage/ad/default.png');
        }
        $image = $ad->thumb;        
        return $image;
    }
    public function getFullAttribute()
    {
    	$ad=AdImage::where('ad_id',$this->id)->first();
    	if (is_null($ad)) {
            return url('storage/ad/default.png');
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
            $fav = Favourite::where('user_id',$user_id)->where('ad_id',$this->id)->first();
            if(!$fav){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
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
