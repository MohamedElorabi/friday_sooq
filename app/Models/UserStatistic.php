<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatistic extends Model
{
    use HasFactory;
    public $attributes = [ 'hits' => 0 ];
    protected $fillable=['user_id','type','date','ip'];
    protected  $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
    public static function boot() {
        parent::boot();
        // Any time the instance is updated (but not created)
        static::saving( function ($tracker) {
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        } );
    }

    public static function hit($id,$type) {
        static::firstOrCreate([
                    'type' => $type,
                    'user_id' => $id,
                  'ip'   => $_SERVER['REMOTE_ADDR'],
                  'date' => date('Y-m-d'),
              ])->save();
    }
}
