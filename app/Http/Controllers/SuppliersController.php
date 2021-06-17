<?php

namespace App\Http\Controllers;

use App\Suppliers;
use Illuminate\Http\Request;


class SuppliersController extends Controller
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
        $supplier=Suppliers::orderBy('id','DESC')->paginate(10);
        return view('backend.suppliers.index')->with('suppliers',$supplier);
    }

    public function create(){
        return view('backend.suppliers.create');
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:suppliers'],
            'phone'=>'required|numeric|min:6666666666|max:9999999999',
            'address'=>'string|nullable',
            'type'=>['required', 'string', 'max:255'],
            'accholder' => ['required', 'string', 'max:255'],
            'accnumber'=>'required|numeric',
            'city' => ['required', 'string', 'max:255'],
            'photo'=>'string|required',
            'ifsc' => ['required', 'string', 'max:255'],
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=Suppliers::create($data);
        if($status){
            request()->session()->flash('success','Supplier successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding Supplier');
        }
        return redirect()->route('suppliers.index');
    }

    public function edit($id){

        $supplier=Suppliers::findOrFail($id);
        return view('backend.suppliers.edit')->with('supplier',$supplier);
    }

    public function update(Request $request, $id)
    {
        $supplier=Suppliers::findOrFail($id);
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone'=>'required|numeric|min:6666666666|max:9999999999',
            'address'=>'string|nullable',
            'type'=>['required', 'string', 'max:255'],
            'accholder' => ['required', 'string', 'max:255'],
            'accnumber'=>'required|numeric',
            'city' => ['required', 'string', 'max:255'],
            'photo'=>'string|required',
            'ifsc' => ['required', 'string', 'max:255'],
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=$supplier->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating');
        }
        return redirect()->route('suppliers.index');
    }

    public function destroy($id){

        $supplier=Suppliers::findOrFail($id);
        $status=$supplier->delete();
        if($status){
            request()->session()->flash('success','Supplier successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting Supplier');
        }
        return redirect()->route('suppliers.index');
    }
}
