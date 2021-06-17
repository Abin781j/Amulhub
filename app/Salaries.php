<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    protected $fillable = [
        'emp_id' , 'salary_month' , 'paid_amount' 
     ];
}

