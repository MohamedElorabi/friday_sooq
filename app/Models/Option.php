<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable=['name_ar','name_en','type'];
    protected  $hidden = ['created_at','updated_at'];

    public function option_details(){
        return $this->hasMany(OptionDetails::class,'option_id');
     }
}
