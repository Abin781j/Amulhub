<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advsalaries extends Model
{
    protected $fillable = [
        'emp_id' , 'month' , 'year' , 'advanced_salary' , 'status'
     ];
}
