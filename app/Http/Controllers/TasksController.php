<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->select('id')
        ->whereNotIn('status', ['delivered', 'cancel'])
        ->get();
        $employees = DB::table('employees')
        ->join('attendences', 'employees.id', '=', 'attendences.emp_id')
        ->select('employees.id', 'attendences.attendence','attendences.att_date')->distinct()
        ->get();
        $date=date("d/m/y");
        //return $employees;
        foreach($employees as $value) {
            if($value->attendence=='present' && $value->att_date==$date)
            {
                //echo  $value->id;
                $employs[]=$value->id;

            }
        }
        //$values=['orders'=>$orders,'employees'=>$employees];
        return view('backend.assigntask')->with('employs',$employs)->with('orders',$orders);
    }
}
