@extends('backend.layouts.master')
@section('title','AMULHUB || Employee Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Employee Details</h5>
    <div class="card-body">
      <form method="post" action="{{route('employees.update',$employee->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Name</label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$employee->name}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{$employee->email}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
            <label for="inputPassword" class="col-form-label">Phone</label>
          <input id="inputPassword" type="text" name="phone" placeholder="Enter phone"  value="{{$employee->phone}}" class="form-control">
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
            <label for="inputDesc" class="col-form-label">Address</label>
            <textarea class="form-control" id="address" name="address">{{$employee->address}}</textarea>
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$employee->photo}}">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Experience</label>
          <input id="inputTitle" type="text" name="experience" placeholder="Enter Experience"  value="{{$employee->experience}}" class="form-control">
          @error('experience')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Salary</label>
          <input id="inputTitle" type="text" name="salary" placeholder="Enter Salary"  value="{{$employee->salary}}" class="form-control">
          @error('salary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Leave</label>
          <input id="inputTitle" type="text" name="vacation" placeholder="Enter Leave"  value="{{$employee->vacation}}" class="form-control">
          @error('vacation')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">City</label>
          <input id="inputTitle" type="text" name="city" placeholder="Enter City"  value="{{$employee->city}}" class="form-control">
          @error('city')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{(($employee->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($employee->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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