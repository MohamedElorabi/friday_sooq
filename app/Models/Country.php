<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar','name_en','country_code','currency','image','iso'
    ];

    public function getNameAttribute()
    {
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }

    public function cities(){
        return $this->hasMany(City::class,'country_id');
    }

    public function getImageAttribute()
    {
        if(Storage::exists('/country/159x186/'.$this->attributes['image'])){
            return url('storage/country/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/country/').'/'.$this->attributes['image'];
        }
    }
}
