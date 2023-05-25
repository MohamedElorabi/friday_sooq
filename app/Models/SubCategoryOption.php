<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryOption extends Model
{
    use HasFactory;

    protected $fillable=['option_id','sub_category_id'];
    protected  $hidden = ['created_at','updated_at'];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function option()
    {
        return $this->belongsTo(Option::class,'option_id');
    }
    public function parent_option(){
        return $this->hasMany(OptionDetails::class,'sub_category_option_id');
    }
    public function option_details(){
        return $this->hasMany(OptionDetails::class,'sub_category_option_id');
    }
}
