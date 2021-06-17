<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $fillable = [
        'name' , 'email' , 'phone' ,  'address' , 'photo' , 'type' , 'accholder' , 'accnumber' , 'ifsc' , 'city'  , 'status'
     ];
    
}
