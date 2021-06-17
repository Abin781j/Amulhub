<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designations;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations=Designations::orderBy('id','DESC')->paginate(10);
        return view('backend.designation.index')->with('designations',$designations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.designation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|max:50|unique',
            'description'=>'string|nullable',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=Designations::create($data);
        if($status){
            request()->session()->flash('success','Designations successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred while adding Designations');
        }
        return redirect()->route('designation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation=Designations::findOrFail($id);
        return view('backend.designation.edit')->with('designation',$designation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $designation=Designations::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required|max:50|unique:designations',
            'description'=>'string|nullable',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=$designation->fill($data)->save();
        if($status){
            request()->session()->flash('success','Designations successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred while updating Designations');
        }
        return redirect()->route('designation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation=Designations::findOrFail($id);
        $status=$designation->delete();
        if($status){
            request()->session()->flash('success','Designations successfully deleted');
        }
        else{
            request()->session()->flash('error','Error occurred while deleting Designations');
        }
        return redirect()->route('designation.index');
    }
}
