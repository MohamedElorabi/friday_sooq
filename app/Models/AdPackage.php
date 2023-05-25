<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class AdPackage extends Model
{
    use HasFactory;

    protected $fillable=['name_ar','name_en','price','period','image'];
    
     public function adPackageItems(){
        return $this->hasMany(AdPackageItem::class,'package_id');
    }
    public function getImageAttribute()
    {
        if(Storage::exists('/package/159x186/'.$this->attributes['image'])){
            return url('storage/package/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/package/').'/'.$this->attributes['image'];
        }
    }

   
}
