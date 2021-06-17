@extends('backend.layouts.master')
@section('title','AMULHUB || Edit Suppliers')
@section('main-content')

<div class="card">
  <h5 class="card-header">Add Advanced Salary</h5>
      <div class="card-body">
        <form method="post" action="{{route('salaries.update', $salary->id)}}">
          @csrf 
          @method('PATCH')
          <div class="form-group">
            @php
            $employee=DB::table('employees')->get();
            @endphp
            <label for="type" class="col-form-label">Employee Id</label>
            <select name="type" class="form-control">
              @foreach($employees as $employee)  
                <option value="" {{(({{$employee->id}}) ? 'selected' : '')}}>{{$employee->id}}</option>
              @endforeach
            </select>
          @error('emp_id')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
  
          <div class="form-group">
            <label for="type" class="col-form-label">Month</label>
            <select name="type" class="form-control">
              <option value=''>--Select Month--</option>
              <option selected value='Janaury'>Janaury</option>
              <option value='February'>February</option>
              <option value='March'>March</option>
              <option value='April'>April</option>
              <option value='May'>May</option>
              <option value='June'>June</option>
              <option value='July'>July</option>
              <option value='August'>August</option>
              <option value='September'>September</option>
              <option value='October'>October</option>
              <option value='November'>November</option>
              <option value='December'>December</option>
            </select>
          @error('type')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          
          <div class="form-group">
              <label for="inputPassword" class="col-form-label">Year</label>
            <input id="inputYear" type="text" name="year" placeholder="Enter year"  value="{{old('phone')}}" class="form-control">
            @error('year')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Advanced Salary</label>
            <input id="inputadvanced_salary" type="text" name="advanced_salary" placeholder="Enter Advanced Salary"  value="{{old('advanced_salary')}}" class="form-control">
            @error('advanced_salary')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
            <div class="form-group">
              <label for="status" class="col-form-label">Status</label>
              <select name="status" class="form-control">
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
              </select>
            @error('status')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
          <div class="form-group mb-3">
            <button type="reset" class="btn btn-warning">Reset</button>
             <button class="btn btn-success" type="submit">Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush