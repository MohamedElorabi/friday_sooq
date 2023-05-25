<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    use HasFactory;

    protected $fillable=['name_ar','name_en','price','period'];
    
     public function userPackageItems(){
        return $this->hasMany(UserPackageItem::class,'package_id');
    }

   
}
