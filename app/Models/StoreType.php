<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StoreType extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar','name_en','image'];
    protected  $hidden = ['created_at','updated_at'];
    
    public function getImageAttribute()
    {
        if(Storage::exists('/storetype/159x186/'.$this->attributes['image'])){
            return url('storage/storetype/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/storetype/').'/'.$this->attributes['image'];
        }
    }
}
