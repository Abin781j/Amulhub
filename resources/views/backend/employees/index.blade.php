@extends('backend.layouts.master')
@section('title','AMULHUB || Employee Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Employees List</h6>
      <a href="{{route('employees.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Employee</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($employees)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Photo</th>
              <th>Experience</th>
              <th>Salary</th>
              <th>City</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Experience</th>
                <th>Salary</th>
                <th>City</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($employees as $employee)   
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->address}}</td>
                    <td>
                        @if($employee->photo)
                            <img src="{{$employee->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$employee->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                        @endif
                    </td>
                    <td>{{$employee->experience}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>{{$employee->city}}</td>
                    <td>
                        @if($employee->status=='active')
                            <span class="badge badge-success">{{$employee->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$employee->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('employees.destroy',[$employee->id])}}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$employee->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        
        @else
          <h6 class="text-center">No Employers found!!! Please create an Employee</h6>
        @endif
      </div>
    </div>
</div>
@endsection