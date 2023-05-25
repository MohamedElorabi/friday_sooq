<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=['name_ar','name_en','content_ar','content_en','slug'];
    protected  $hidden = ['created_at','updated_at'];
    
}
