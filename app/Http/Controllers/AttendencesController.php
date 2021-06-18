<?php

namespace App\Http\Controllers;

use App\Attendences;
use App\Models\Employees;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendencesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function create(){
        $employee=Employees::orderBy('id','DESC')->paginate(10);
        return view('backend.attendences.take')->with('employees',$employee);
    }

    public function all(){
        $attendences=Attendences::select('att_edit')->groupBy('att_edit')->get();
        return view('backend.attendences.all')->with('attendences',$attendences);
    }

    public function add(Request $request){
        $d=$request->att_date;
        $att_date=DB::table('attendences')->where('att_date',$d)->first();
        if($att_date){
            request()->session()->flash('error','Attendence already taken for today!');
            return redirect()->route('attendences.create');
        }
        else{
            foreach ($request->emp_id as $id) {
                $data[]=[
                    "emp_id"=>$id,
                    "att_date"=>$request->att_date[$id],
                    "att_year"=>$request->att_year[$id],
                    "attendence"=>$request->attendence[$id],
                    "att_edit"=>date('d_m_y')
                ];
            }
            $status=DB::table('attendences')->insert($data);
            if($status){
                request()->session()->flash('success','Attendence successfully added');
            }
            else{
                request()->session()->flash('error','Error occurred while adding Attendence');
            }
            return redirect()->route('attendences.create');
        }
    }

    public function edit($att_edit){
        $data=DB::table('attendences')->join('employees','attendences.emp_id','employees.id')->select('employees.name','employees.email','employees.photo','attendences.*')->where('att_edit',$att_edit)->get();
        return view('backend.attendences.edit')->with('data',$data);
    }

    public function update(Request $request){
        
            foreach ($request->id as $id) {
                $data=[
                    "att_date"=>$request->att_date,
                    "att_year"=>$request->att_year,
                    "attendence"=>$request->attendence[$id],
                ];
                $attendence=Attendences::where(['att_date'=>$request->att_date, 'id'=>$id])->update(['attendence'=>$data['attendence']]);
            }
            
            if($attendence){
                request()->session()->flash('success','Attendence successfully updated');
            }
            else{
                request()->session()->flash('error','Error occurred while updating Attendence');
            }
            return redirect()->route('attendences.all');
    }

    public function view($att_edit){
        $data=DB::table('attendences')->join('employees','attendences.emp_id','employees.id')->select('employees.name','employees.email','employees.photo','attendences.*')->where('att_edit',$att_edit)->get();
        return view('backend.attendences.view')->with('data',$data);
    }

}
 