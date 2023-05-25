<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreStatues extends Model
{
    use HasFactory;
    protected $table = 'store_status';
    protected $fillable=['store_id','status','title'];
    protected  $hidden = ['created_at','updated_at'];

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
}
