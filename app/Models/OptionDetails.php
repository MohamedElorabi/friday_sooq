<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionDetails extends Model
{
    use HasFactory;

    protected $fillable=['name_ar','name_en','sub_category_option_id'];
    protected  $hidden = ['created_at','updated_at'];

    public function sub_category_option()
    {
        return $this->belongsTo(SubCategoryOption::class,'sub_category_option_id');
    }
    
}
