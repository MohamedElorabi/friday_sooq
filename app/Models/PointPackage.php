<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PointPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar','name_en','price','points'
    ];
    

}
