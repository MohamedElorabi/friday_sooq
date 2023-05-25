<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use DB;

class Store extends Model
{
    use HasFactory;
    protected $fillable=['name','first_name','last_name','description','avatar','cover','address','coordinates','phone','website','user_id','type_id','status','views','latitude','Longitude','created_at'];
    protected $casts = [
        'coordinates' => 'array'
        ];
    protected $hidden = ['updated_at'];
    
    protected $appends = ['favouried','is_follow','rate','is_rated','available'];


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function likes(){
        return $this->hasMany(StoreLike::class,'store_id');
    }

    public function ad(){
        return $this->belongsTo(Ad::class,'user_id','id');
    }

    public function type(){
        return $this->belongsTo(StoreType::class,'type_id','id');
    }
    public function ads(){
        return $this->hasMany(Ad::class,'user_id','user_id');
    }
    public function followers(){
        return $this->hasMany(Follow::class,'follower_id','user_id');
    }
    public function categories(){
        return $this->hasMany(StoreCategory::class,'store_id');
    }

    public function products(){
        return $this->hasMany(StoreProduct::class,'store_id');
    }

    public function flyers(){
        return $this->hasMany(StoreFlyer::class,'store_id');
    }

    public function getAvatarAttribute()
    {
        if(Storage::exists('/store/159x186/'.$this->attributes['avatar'])){
            return url('storage/store/159x186/').'/'.$this->attributes['avatar'];
        }else{
            return url('storage/store/').'/'.$this->attributes['avatar'];
        }
    }
    
    public function getCoverAttribute()
    {
        if(Storage::exists('/store/159x186/'.$this->attributes['cover'])){
            return url('storage/store/159x186/').'/'.$this->attributes['cover'];
        }else{
            return url('storage/store/').'/'.$this->attributes['cover'];
        }
    }
    public function getIsFollowAttribute()
    {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id;
            $follow = Follow::where('user_id',$user_id)->where('follower_id',$this->user_id)->first();
            if(is_null($follow)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    public function getIsRatedAttribute()
    {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id;
            $follow = StoreRating::where('user_id',$user_id)->where('store_id',$this->id)->first();
            if(is_null($follow)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
    public function getFavoriedAttribute()
    {
        if(Auth::user()){
            $fav = StoreLike::where('user_id',auth()->user()->id)->where('store_id',$this->id)->first();
            if(is_null($fav)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    
     public function getFavouriedAttribute()
    {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id; // !!!THIS ID WE CAN USE TO GET DATA OF YOUR USER!!!
             $fav = StoreLike::where('user_id',$user_id)->where('store_id',$this->id)->first();
             if(!$fav){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    public function getRateAttribute()
    {
        $rate = StoreRating::where('store_id',$this->id)->get();
        if($rate){
            return ['rate' => $rate->sum('rate'),'total' => $rate->count()];
        }else{
            return 0;
        }
    }


    public function getAvailableAttribute(){
        $today = Carbon::now();
        $work = StoreWorkTime::where('store_id',$this->id)->where('day',$today->format('l'))->first();
        if($work){
            if($today->format('hh:mm:ss') >= $work->start && $today->format('hh:mm:ss') <= $work->end){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
