<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StoreFlyerImage extends Model
{
    use HasFactory;

    protected $fillable=['image','flyer_id'];
    protected $hidden = array('created_at', 'updated_at','id','store_id');

    public function getImageAttribute()
    {
        if (!$this->attributes['image']) {
            return url('storage/storeflyer/default.png');
        }
        if(Storage::exists('/ad/159x186/'.$this->attributes['image'])){
            return url('storage/storeflyer/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/storeflyer/').'/'.$this->attributes['image'];
        }
    }
}
