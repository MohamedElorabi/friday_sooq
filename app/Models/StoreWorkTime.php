<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StoreWorkTime extends Model
{
    use HasFactory;
    protected $fillable=['store_id','day','start','end'];
    protected $hidden = ['created_at','updated_at'];


    public function store(){
        return $this->belongsTo(Store::class,'store_id');
    }
   
}
