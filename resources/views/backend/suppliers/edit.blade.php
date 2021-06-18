@extends('backend.layouts.master')
@section('title','AMULHUB || Edit Suppliers')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Suppliers Details</h5>
    <div class="card-body">
      <form method="post" action="{{route('suppliers.update',$supplier->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Name</label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$supplier->name}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{$supplier->email}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group">
            <label for="inputPassword" class="col-form-label">Phone</label>
          <input id="inputPassword" type="text" name="phone" placeholder="Enter phone"  value="{{$supplier->phone}}" class="form-control">
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
            <label for="inputDesc" class="col-form-label">Address</label>
            <textarea class="form-control" id="address" name="address">{{$supplier->address}}</textarea>
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
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$supplier->photo}}">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="type" class="col-form-label">Supplier Type</label>
          <select name="type" class="form-control">
              <option value="Distributor"{{(($supplier->type=='Distributor') ? 'selected' : '')}}>Distributor</option>
              <option value="Brochure"{{(($supplier->type=='Brochure') ? 'selected' : '')}}>Brochure</option>
              <option value="Whole Seller"{{(($supplier->type=='Whole Seller') ? 'selected' : '')}}>Whole Seller</option>
          </select>
          @error('type')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Account Holder</label>
              <input id="inputTitle" type="text" name="accholder" placeholder="Enter Account Holder's Name"  value="{{$supplier->accholder}}" class="form-control">
              @error('accholder')
              <span class="text-danger">{{$message}}</span>
              @enderror
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Account Number</label>
              <input id="inputTitle" type="text" name="accnumber" placeholder="Enter Account Number"  value="{{$supplier->accnumber}}" class="form-control">
              @error('accnumber')
              <span class="text-danger">{{$message}}</span>
              @enderror
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">IFSC</label>
              <input id="inputTitle" type="text" name="ifsc" placeholder="Enter ifsc"  value="{{$supplier->ifsc}}" class="form-control">
              @error('ifsc')
              <span class="text-danger">{{$message}}</span>
              @enderror
        </div>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">City</label>
          <input id="inputTitle" type="text" name="city" placeholder="Enter City"  value="{{$supplier->city}}" class="form-control">
          @error('city')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{(($supplier->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($supplier->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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