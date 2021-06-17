<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use App\Models\Employees;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }
    public function dashboard()
    {
        return view('employee.dashboard');
    }

    // Login
    public function login(){
        return view('employee.login');
    }
    public function eloginSubmit(Request $request){
        $this->validate($request,
        [
            'email'=>'string|required|email',
            'password'=>'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        $data = $request->all();
        //$employee=Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password,'status'=>'active']);
        $employee=DB::table('employees')->where(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])->first();
        if($employee){
            Session::put('employee',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('employee.dashboard');
            //return redirect()->route('employee.dashboard');
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('employee');
        auth()->logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register(){
        return view('employee.register');
    }
    public function registerSubmit(Request $request){
        $this->validate($request,
        [
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:employees,email',
            'phone'=>'required|numeric',
            'address'=>'string|required',
            'password'=>'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'city'=>'required|string'
        ]);
        $data=$request->all();
        $data['status']='inactive';
        $data['password']=Hash::make($request->password);
        $status=Employees::create($data);
        // dd($status);
        //$check=DB::table('employees')->insert($data);
        Session::put('email',$data['email']);
        if($status){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('employee.job');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'sname'=>$data['sname'],
            'licence'=>$data['licence'],
            'phone'=>$data['phone'],
            'status'=>'active'
            ]);
    }

    public function job()
    {
        return view('employee.jobs');
    }

    public function jobsubmit(Request $request){
        //return $request->all();
        $request->validate([

            'file' => 'required|mimes:pdf,xlx,csv|max:2048',

        ]);
        $fileName = time().'.'.$request->file->extension();
        $data=$request->all();
        $des=$data['designation'];
        $emp=$data['reg_id'];
        $res=DB::table('jobs')->insert(
            array(
                   'desig_id'     =>   $des, 
                   'reg_id'   =>   $emp,
                   'file'   =>  $fileName
            )
       );
        $request->file->move(public_path('uploads'), $fileName);
        if($res){
            request()->session()->flash('success','Successfully registered for Job');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
}
