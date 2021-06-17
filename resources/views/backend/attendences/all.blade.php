@extends('backend.layouts.master')
@section('title','AMULHUB || Attendance Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Attendence List</h6>
      <a href="{{route('attendences.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Attendence</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($attendences)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>S.N.</th>
              <th>Date</th>
              <th>Action</th>
              </tr>
          </tfoot>
          <tbody>
            @php
               $i=1; 
            @endphp
            @foreach($attendences as $attendence)   
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$attendence->att_edit}}</td>
                    @php
                      $att_edit=$attendence->att_edit;  
                      $f=date("d_m_y")==$att_edit;
                    @endphp
                    <td>
                        <a href="{{route('attendences.view',[$att_edit])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-eye"></i></a>
                        <?php if($f){ ?>
                          <a href="{{route('attendences.edit',[$att_edit])}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <?php } ?>
                        {{--<form method="POST" action="{{route('employees.destroy',[$employee->id])}}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$employee->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>--}}
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