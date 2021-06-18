<?php

namespace App\Http\Controllers;

use App\Advsalaries;
use App\Salaries;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalariesController extends Controller
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
        $salary=Advsalaries::orderBy('id','DESC')->paginate(10);
        return view('backend.salaries.index')->with('salaries',$salary);
    }

    public function create(){
        return view('backend.salaries.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'emp_id' => ['required', 'string', 'max:255'],
            'month' => ['required', 'string', 'max:255'],
            'year'=>'required|numeric|min:2020',
            'advanced_salary'=>'required|numeric|nullable',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=Advsalaries::create($data);
        if($status){
            request()->session()->flash('success','Salary successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding Salary');
        }
        return redirect()->route('salaries.index');
    }

    public function edit($id){

        $salary=Advsalaries::findOrFail($id);
        return view('backend.salaries.edit')->with('salaries',$salary);
    }

    public function update(Request $request, $id)
    {
        $salary=Advsalaries::findOrFail($id);
        $this->validate($request,[
            'emp_id' => ['required', 'string', 'max:255'],
            'month' => ['required', 'string', 'max:255'],
            'year'=>'required|numeric|min:2020',
            'advanced_salary'=>'numeric|nullable',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=$salary->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating');
        }
        return redirect()->route('salaries.index');
    }

    public function destroy($id){

        $salary=Advsalaries::findOrFail($id);
        $status=$supplier->delete();
        if($status){
            request()->session()->flash('success','Salaries successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting Supplier');
        }
        return redirect()->route('salaries.index');
    }

    public function pay_salary(){
        
        $month=date("F",strtotime('-1 month'));
        $salary=DB::table('advsalaries')->join('employees','advsalaries.emp_id','=','employees.id')
                ->select('advsalaries.*','employees.name','employees.salary','employees.photo')->where('month',$month)->get();
        return view('backend.salaries.pay')->with('salaries',$salary);; 
    }  

}
  