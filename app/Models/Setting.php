<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";

        protected $fillable=['name_ar','name_en','phone','email','facebook','twitter','instagram','snapchat','youtube','tiktok'];
    	protected  $hidden = ['created_at','updated_at'];

}
