<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'description' , 'amount' , 'month' ,  'date' , 'year'
     ];
}
