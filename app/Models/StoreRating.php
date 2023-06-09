<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreRating extends Model
{
    use HasFactory;
    protected $fillable = ['rate','store_id','user_id'];
    protected  $hidden = ['created_at','updated_at'];
    
    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
}
