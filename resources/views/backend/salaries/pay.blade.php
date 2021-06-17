@extends('backend.layouts.master')
@section('title','AMULHUB || Salary Payment Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Salaries List  {{date("F Y")}}</h6>
      <a href="{{route('salaries.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Advanced Salary</a>
    </div>
    <div class="card-body">
        @php
        $month=date("F",strtotime('-1 month'));
        $salary=DB::table('advsalaries')->join('employees','advsalaries.emp_id','employees.id')
                ->select('advsalaries.*','employees.name','employees.salary','employees.photo')->where('month',$month)->get();
        //dd($month);
        @endphp
      <div class="table-responsive">
        @if(count($salary)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Employee Name</th>
              <th>Photo</th>
              <th>Salary</th>
              <th>Month</th>
              <th>Advanced Salary</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Employee Name</th>
              <th>Photo</th>
              <th>Salary</th>
              <th>Month</th>
              <th>Advanced Salary</th>
              <th>Action</th>
              </tr>
          </tfoot>
    
          <tbody>
             
            @foreach($salary as $emp)   
                <tr>
                    <td>
                        {{$emp->name}}
                      
                    </td>
                    <td>
                      @if($emp->photo)
                          <img src="{{$emp->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$emp->photo}}">
                      @else
                          <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                      @endif
                  </td>
                  <td>
                      {{$emp->salary}}
                  </td>
                    <td><span class="badge badge-success">{{ date("F",strtotime('-1 months'))}}</span></td>
                    <td>{{$emp->advanced_salary}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning text " >Pay now</a>
                        {{--<form method="POST" action="{{route('salaries.destroy',[$salary->id])}}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$salary->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>--}}
                    </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        
        @else
          <h6 class="text-center">No Salaries found!!! Please create an Employee</h6>
        @endif
      </div>
    </div>
</div>
@endsection