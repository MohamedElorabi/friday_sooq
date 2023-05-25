<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $fillable=['ad_id','user_id'];
    protected  $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }
}
