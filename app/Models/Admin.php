<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasRoles, HasFactory, Notifiable;
     protected $guard_name= 'admin';
    protected $guarded = ['id'];
    
}
