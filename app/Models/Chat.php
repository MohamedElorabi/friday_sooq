<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_one','user_two'];
    protected $hidden = ['created_at','updated_at'];
    
    public function user_one()
    {
        return $this->belongsTo(User::class,'user_one');
    }
    public function user_two()
    {
        return $this->belongsTo(User::class,'user_two');
    }
    
}
