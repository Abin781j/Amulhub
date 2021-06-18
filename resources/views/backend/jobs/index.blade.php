@extends('backend.layouts.master')
@section('title','AMULHUB || Jobs Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Applied Job List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($jobs)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Job Name</th>
              <th>Job Description</th>
              <th>Resume</th>
              <th>Status</th>
              <th>Select</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Job Name</th>
                <th>Job Description</th>
                <th>Resume</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($jobs as $job)   
                <tr>
                    @php
                        $rid=$job->reg_id;
                        $emp=DB::table('employees')->select('name')->where('id', $rid)->get();
                    @endphp
                    <td>{{$emp}}</td>
                    <td>{{$job->email}}</td>

                    <td>{{$job->name}}</td>
                    <td>{{$job->description}}</td>
                    <td><a class="btn btn-primary btn-sm" style="height:30px; width:30px;border-radius:50%" href="uploads/{{$job->file}}"><i class="fas fa-eye"></i></a></td>
                    <td>
                        @if($job->status=='active')
                            <span class="badge badge-success">Selected</span>
                        @else
                            <span class="badge badge-warning">Not Selected</span>
                        @endif
                    </td>
                    <td>
                        {{--<a href="{{route('job.update',$job->reg_id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>--}}
                        <form method="POST" action="{{route('job.update',[$job->reg_id])}}">
                          @csrf 
                              <button class="btn btn-primary btn-sm float-left mr-1" data-id={{$job->reg_id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                    
                </tr>  
            @endforeach
          </tbody>
        </table>
        @else
          <h6 class="text-center">No job requests found!!! </h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>
      
      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4,5]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){
            
        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush