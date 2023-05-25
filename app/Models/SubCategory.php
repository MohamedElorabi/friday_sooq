<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar','name_en','category_id','parent_id','image','slug'
    ];


    public function getNameAttribute()
    {
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_ar'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function parentCat()
    {
        return $this->belongsTo(SubCategory::class,'parent_id');
    }

    public function parents(){
        return $this->hasMany(SubCategory::class,'parent_id');
    }

    public function getImageAttribute()
    {
        if(Storage::exists('/subcategory/159x186/'.$this->attributes['image'])){
            return url('storage/subcategory/159x186/').'/'.$this->attributes['image'];
        }else{
            return url('storage/subcategory/').'/'.$this->attributes['image'];
        }
    }
}
