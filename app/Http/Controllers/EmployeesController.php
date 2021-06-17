<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
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

    public function index(){
        $employee=Employees::orderBy('id','DESC')->paginate(10);
        return view('backend.employees.index')->with('employees',$employee);
    }

    public function create(){
        return view('backend.employees.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'phone'=>'required|numeric|min:6666666666|max:9999999999',
            'address'=>'string|nullable',
            'experience'=>'required|numeric',
            'salary'=>'numeric',
            'designation'=>['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=Employees::create($data);
        if($status){
            request()->session()->flash('success','Employee successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding Employee');
        }
        return redirect()->route('employees.index');
    }

    public function edit($id){

        $employee=Employees::findOrFail($id);
        return view('backend.employees.edit')->with('employee',$employee);
    }

    public function update(Request $request, $id)
    {
        $employee=Employees::findOrFail($id);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone'=>'required|numeric|min:6666666666|max:9999999999',
            'address'=>'string|nullable',
            'experience'=>'required|numeric',
            'salary'=>'required|numeric',
            'city' => ['required', 'string', 'max:255'],
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=$employee->fill($data)->save();
        if($status){
            request()->session()->flash('success','Employee successfully updated');
        }
        else{
            request()->session()->flash('error','Employee occurred while updating banner');
        }
        return redirect()->route('employees.index');
    }

    public function destroy($id){

        $employee=Employees::findOrFail($id);
        $status=$employee->delete();
        if($status){
            request()->session()->flash('success','Employee successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting Employee');
        }
        return redirect()->route('employees.index');
    }

    
}
