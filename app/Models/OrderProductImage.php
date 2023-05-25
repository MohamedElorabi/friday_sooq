<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OrderProductImage extends Model
{
    use HasFactory;

    protected $fillable=['image','order_product_id'];
    protected $hidden = array('created_at', 'updated_at','order_product_id');

    public function getImageAttribute()
    {
        if (!$this->attributes['image']) {
            return url('storage/ad/default.png');
        }
            return url('storage/ad/').'/'.$this->attributes['image'];
    }
}
