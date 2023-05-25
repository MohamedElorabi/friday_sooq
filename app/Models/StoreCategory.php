<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar','name_en','image','store_id'];
    protected $hidden = ['created_at','updated_at'];

    public function products(){
        return $this->hasMany(StoreProduct::class,'category_id');
    }

    public function getImageAttribute()
    {
        if (!$this->attributes['image']) {
            return storage_path('app/default.png');
        }
        return url('storage/storecategory/').'/'.$this->attributes['image'];
    }


}
