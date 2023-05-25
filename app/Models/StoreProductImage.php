<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProductImage extends Model
{
    use HasFactory;

    protected $fillable=['image','product_id'];
    protected $hidden = array('created_at', 'updated_at','id','product_id');

    public function getImageAttribute()
    {
        if (!$this->attributes['image']) {
            return storage_path('app/default.png');
        }
        return url('storage/storeproduct/').'/'.$this->attributes['image'];
    }
}
