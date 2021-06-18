@extends('backend.layouts.master')
@section('title','AMULHUB || Expenses Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Expenses List</h6>
      <a href="{{route('expenses.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Expenses</a> &nbsp;
      <a href="{{route('expenses.today')}}" class="btn btn-warning btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"> Today's Expenses</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($expenses)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Expense Details</th>
              <th>Amount</th>
              <th>Month</th>
              <th>Date</th>
              <th>Year</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Expense Details</th>
              <th>Amount</th>
              <th>Month</th>
              <th>Date</th>
              <th>Year</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($expenses as $expense)   
                <tr>
                    <td>{{$expense->description}}</td>
                    <td>{{$expense->amount}}</td>
                    <td>{{$expense->month}}</td>
                    <td>{{$expense->date}}</td>
                    <td>{{$expense->year}}</td>
                </tr>  
            @endforeach
          </tbody>
        </table>
        
        @else
          <h6 class="text-center">No Expenses found!!! Please create an Expenses</h6>
        @endif
      </div>
    </div>
</div>
@endsection