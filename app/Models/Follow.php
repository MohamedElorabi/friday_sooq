<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follow extends Model
{
    

    protected $fillable=['follower_id','user_id'];
      protected $table = "followers";

         public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

          public function follower()
    {
        return $this->belongsTo(User::class,'follower_id');
    }
        
}
