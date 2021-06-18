@extends('backend.layouts.master')
@section('title','AMULHUB || Attendences Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>

    <div class="card-header py-3">
      <h3 align="center" style="color:red;font-size:25px;"><b>Today {{date('d/m/y')}}</b></h3>
      <h6 class="m-0 font-weight-bold text-primary float-left">Employees List</h6>
      <a href="{{route('attendences.all')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">All Attendence</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($employees)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Photo</th>
              <th>Attendence</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Attendence</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($employees as $employee)   
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>
                        @if($employee->photo)
                            <img src="{{$employee->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$employee->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{route('attendences.add')}}">
                          @csrf 
                              <input type="hidden" name="emp_id[]" value="{{$employee->id}}">
                              <input type="radio" name="attendence[{{$employee->id}}]" id="" value="present">Present
                              <input type="radio" name="attendence[{{$employee->id}}]" id="" value="absent">Absent
                              <input type="hidden" name="att_date[{{$employee->id}}]" value="{{date('d/m/y')}}">
                              <input type="hidden" name="att_year[{{$employee->id}}]" value="{{date('Y')}}">
                            
                    </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        <button type="submit" class="btn btn-success ">Take Attendence</button>
      </form>
        @else
          <h6 class="text-center">No Employers found!!! Please create an Employee</h6>
        @endif
      </div>
    </div>
</div>
@endsection