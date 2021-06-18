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
      
      <h6 class="m-0 font-weight-bold text-primary float-left">Employees List</h6>
      <a href="{{route('attendences.all')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">All Attendence</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($data)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Date</th>
                <th>Attendence</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Date</th>
                <th>Attendence</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($data as $row)   
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                        @if($row->photo)
                            <img src="{{$row->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$row->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                        @endif
                    </td>
                    <td>
                        {{$row->att_date}}     
                    </td>
                    <td>{{$row->attendence}}</td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        @else
          <h6 class="text-center">No Attendences found!!! Please create an Attendence</h6>
        @endif
      </div>
    </div>
</div>
@endsection