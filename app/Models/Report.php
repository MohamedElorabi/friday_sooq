<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Report extends Model
{
    use HasFactory;
    protected $fillable=['user_id','object_id','type','report'];
    protected $hidden = ['created_at','updated_at'];


    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

   
}
