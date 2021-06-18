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
      <h3 align="center" style="color:red;font-size:25px;"><b>Update Attendence</b></h3>
      <h6 class="m-0 font-weight-bold text-primary float-left">Attendence List</h6>
      <a href="{{route('attendences.all')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User">Update Attendence</a>
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
                        <form method="POST" action="{{route('attendences.update')}}">
                          @csrf 
                              <input type="hidden" name="id[]" value="{{$row->id}}">
                              <input type="radio" name="attendence[{{$row->id}}]" id="" value="present" {{(($row->attendence=='present') ? 'checked' : '')}}>Present
                              <input type="radio" name="attendence[{{$row->id}}]" id="" value="absent" {{(($row->attendence=='absent') ? 'checked' : '')}}>Absent
                              <input type="hidden" name="att_date" value="{{date('d/m/y')}}">
                              <input type="hidden" name="att_year" value="{{date('Y')}}">
                            
                    </td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        <button type="submit" class="btn btn-success ">Update Attendence</button>
      </form>
        @else
          <h6 class="text-center">No Attendence found!!! Please create an Attendence</h6>
        @endif
      </div>
    </div>
</div>
@endsection