<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdOffer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','offer_user_id','ad_id','offer_ad_id','status'];
    protected $hidden = ['created_at','updated_at'];
}
