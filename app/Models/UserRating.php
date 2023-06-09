<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    use HasFactory;
    protected $fillable = ['rate','object_id','user_id'];
    protected  $hidden = ['created_at','updated_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function rated()
    {
        return $this->belongsTo(User::class,'object_id');
    }
}
