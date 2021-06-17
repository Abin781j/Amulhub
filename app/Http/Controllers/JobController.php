<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs;
use App\Models\Employees;

class JobController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')
            ->join('employees', 'jobs.reg_id', '=', 'employees.id')
            ->join('designations', 'jobs.desig_id', '=', 'designations.id')
            ->select('jobs.*', 'employees.name', 'employees.email', 'employees.status', 'designations.name','designations.description')
            ->get();
        //return $jobs;
        return view('backend.jobs.index')->with('jobs',$jobs);
    }

    public function update($id)
    {
        $s=Employees::findOrFail($id);
        if($s) {
            $s->status = 'active';
            $check=$s->save();
        }
        if($check){
            request()->session()->flash('success','Employee selected successfully');
        }
        else{
            request()->session()->flash('error','Error occurred while selecting');
        }
        return redirect()->route('job.index');
    }
}
