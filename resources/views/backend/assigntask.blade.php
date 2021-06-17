@extends('backend.layouts.master')
@section('title','AMULHUB || Salaries Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Salaries List</h6>
      <a href="{{route('salaries.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Advanced Salary</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($salaries)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Order id</th>
              <th>Employee Id</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Order id</th>
                <th>Employee Id</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($salaries as $salary)   
                <tr>
                  @php
                  $employee=DB::table('employees')->select('name','photo','salary')->where('id',$salary->emp_id)->get();
                  @endphp
                    <td>{{$salary->emp_id}}</td>
                    <td>
                      @foreach($employee as $data)
                        {{$data->name}}
                      
                    </td>
                    <td>
                      @if($data->photo)
                          <img src="{{$data->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$data->photo}}">
                      @else
                          <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                      @endif
                  </td>
                  <td>
                      {{$data->salary}}
                  </td>
                      @endforeach
                    <td>{{$salary->year}}</td>
                    <td>{{$salary->month}}</td>
                    <td>{{$salary->advanced_salary}}</td>
                    <td>
                        @if($salary->status=='active')
                            <span class="badge badge-success">{{$salary->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$salary->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('salaries.edit',$salary->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('salaries.destroy',[$salary->id])}}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$salary->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
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