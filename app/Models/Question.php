<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar','name_en','answer_ar','answer_en'
    ];
    
    
    
    public function getNameAttribute()
    {
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }
    
    public function getAnswerAttribute()
    {
        $name = 'answer_'.app()->getLocale();
        return $this->$name;
    }




   
}
