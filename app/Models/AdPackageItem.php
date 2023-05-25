<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdPackageItem extends Model
{
    use HasFactory;

    protected $fillable=['package_id','content_ar','content_en'];
    
    
      public function getContentAttribute()
    {
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }

   
}
