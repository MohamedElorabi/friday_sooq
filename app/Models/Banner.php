<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','link','image','position','code','expire','views'
    ];
    
     public function getImageAttribute()
    {
        if(Storage::exists('/banner/159x186/'.$this->attributes['image'])){
            return url('storage/banner/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/banner/').'/'.$this->attributes['image'];
        }
    }
    
   
}
