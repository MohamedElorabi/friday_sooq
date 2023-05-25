<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AdImage extends Model
{
    use HasFactory;

    protected $fillable=['image','ad_id'];
    protected $hidden = array('created_at', 'updated_at','ad_id');

    public function getImageAttribute()
    {
        if (!$this->attributes['image']) {
            return url('storage/ad/default.png');
        }
            return url('storage/ad/').'/'.$this->attributes['image'];
    }
    public function getThumbAttribute()
    {
        if (!$this->attributes['image']) {

            return url('storage/ad/default.png');
        }else{
            if(Storage::exists('/public/ad/159x186/'.$this->attributes['image'])){
                return url('storage/ad/159x186/').'/'.$this->attributes['image'];
            }else{
                return url('storage/ad/default.png');
            }
        }
    }
}
