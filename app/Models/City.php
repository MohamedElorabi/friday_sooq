<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
   

    protected $fillable = [
        'name_ar','name_en','country_id'
    ];

    public function getNameAttribute()
    {
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }

    public function towns(){
        return $this->hasMany(Town::class,'city_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
}
