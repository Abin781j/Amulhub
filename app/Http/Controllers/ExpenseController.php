<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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
        $expense=Expenses::orderBy('id','DESC')->paginate(10);
        return view('backend.expenses.index')->with('expenses',$expense);
    }

    public function create(){
        return view('backend.expenses.create');
    }

    public function store(Request $request)
    {
        $data=$request->all();
        //dd($data);
        $status=Expenses::create($data);
        if($status){
            request()->session()->flash('success','Expenses successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding Expenses');
        }
        return redirect()->route('expenses.index');
    }

    public function todays_expense(){
        $date= date("d/m/y");
        $todays=Expenses::where('date',$date)->get();
        return view('backend.expenses.today')->with('todays',$todays);
    }

}