<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;
    public $attributes = [ 'hits' => 0 ];

    protected $fillable = [ 'ip', 'date' ];
    protected $table = 'views';

    public static function boot() {
        parent::boot();
        // Any time the instance is updated (but not created)
        static::saving( function ($tracker) {
            $tracker->visit_time = date('H:i:s');
            $tracker->hits++;
        } );
    }

    public static function hit() {
        
        static::firstOrCreate([
                  'ip'   => $_SERVER['REMOTE_ADDR'],
                  'date' => date('Y-m-d'),
              ])->save();
    }
}
