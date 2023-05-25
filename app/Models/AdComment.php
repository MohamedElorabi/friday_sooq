<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdComment extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at'];
    protected $fillable =['comment','user_id','ad_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class,'ad_id');
    }
}
