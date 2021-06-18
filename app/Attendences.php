<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendences extends Model
{
    protected $fillable = [
        'emp_id' , 'att_date' , 'att_year' ,  'attendance' , 'att_edit'
     ];
}
