<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employees extends Authenticatable
{
    use Notifiable;

    protected $guard = 'employee';

    protected $fillable = [
       'name' , 'email' , 'phone' ,  'address' , 'photo' ,'password' , 'designation' , 'experience' , 'salary' , 'vacation' , 'city'  , 'status'
    ];

    protected $hidden = [
        'password' , 'remember_token' ,
    ];
}
