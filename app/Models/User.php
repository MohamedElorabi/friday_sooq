<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'mobile',
        'code',
        'email',
        'country_id',
        'type',
        'has_store',
        'image',
        'bio',
        'device_token',
        'provider',
        'social_id',
        'device_type',
        'balance',
        'wallet_number',
        'points',
        'views',
        'follow'
    ];
    
    protected $appends = ['is_follow','is_blocked','star','rate'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token','updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    public function getImageAttribute()
    {
        if (!$this->attributes['image']) {
             return url('../../wb/imgs/user-img.svg');
        }
        if(Storage::exists('/user/159x186/'.$this->attributes['image'])){
            return url('storage/user/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/user/').'/'.$this->attributes['image'];
        }
    }
    public function ads(){
        return $this->hasMany(Ad::class,'user_id');
    }
    
    public function orders(){
        return $this->hasMany(StoreOrder::class,'user_id');
    }
    public function dailyads(){
        return $this->hasMany(Ad::class,'user_id')->whereDate('created_at', Carbon::today());
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    
     public function followers(){
       return $this->hasMany(Follow::class,'follower_id');
    }
    
     public function following(){
       return $this->hasMany(Follow::class,'user_id');
    }
    
    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
    
    public function getIsFollowAttribute()
    {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id;
            $fav = Follow::where('user_id',$user_id)->where('follower_id',$this->id)->first();
            if(is_null($fav)){
                return false;
            }else{
                return true;
            }
        }
        return false;
    }
    
    public function getIsBlockedAttribute()
    {
    if(request()->header('Authorization')){
        return true;
        }
        return false;
    }
    
    public function getStarAttribute()
    {
        if($this->points >= 400){
            return 'gold';
        }else{
            return 'bronze';
        }
        
    }
    public function getRateAttribute()
    {
        $rate = UserRating::where('object_id',$this->id)->get();
        if($rate->count() != 0){
            return ['rate' => $rate->sum('rate'),'total' => $rate->count()];
        }else{
            return ['rate' => 0,'total' => 0];
        }
    }

    
    
}
