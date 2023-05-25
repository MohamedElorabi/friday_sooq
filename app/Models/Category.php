<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name_ar','name_en','image','slug'
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_ar'
            ]
        ];
    }

    public function getNameAttribute()
    {
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }

    public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function getImageAttribute()
    {
        if(Storage::exists('/category/159x186/'.$this->attributes['image'])){
            return url('storage/category/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/category/').'/'.$this->attributes['image'];
        }
    }
}
