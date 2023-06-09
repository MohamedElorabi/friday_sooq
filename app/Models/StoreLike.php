<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreLike extends Model
{
    use HasFactory;
    protected $fillable=['store_id','user_id'];
    protected  $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
}
