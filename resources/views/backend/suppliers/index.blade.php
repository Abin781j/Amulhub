@extends('backend.layouts.master')
@section('title','AMULHUB || Supplier Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Suppliers List</h6>
      <a href="{{route('suppliers.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Employee</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($suppliers)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Photo</th>
              <th>Supplier Type</th>
              <th>Account Holder</th>
              <th>Account Number</th>
              <th>IFSC code</th>
              <th>City</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Photo</th>
              <th>Supplier Type</th>
              <th>Account Holder</th>
              <th>Account Number</th>
              <th>IFSC code</th>
              <th>City</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
          </tfoot>
          <tbody>
            @foreach($suppliers as $supplier)   
                <tr>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->email}}</td>
                    <td>{{$supplier->phone}}</td>
                    <td>{{$supplier->address}}</td>
                    <td>
                        @if($supplier->photo)
                            <img src="{{$supplier->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$supplier->photo}}">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid zoom" style="max-width:100%" alt="avatar.png">
                        @endif
                    </td>
                    <td>{{$supplier->type}}</td>
                    <td>{{$supplier->accholder}}</td>
                    <td>{{$supplier->accnumber}}</td>
                    <td>{{$supplier->ifsc}}</td>
                    <td>{{$supplier->city}}</td>
                    <td>
                        @if($supplier->status=='active')
                            <span class="badge badge-success">{{$supplier->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$supplier->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('suppliers.edit',$supplier->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('suppliers.destroy',[$supplier->id])}}">
                          @csrf 
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$supplier->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
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