@extends('backend.layouts.master')

@section('title','AMULHUB || Create Expense')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Expense</h5>
        <div class="card-body">
          <form method="post" action="{{route('expenses.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="inputexpense" class="col-form-label">Expense Details</label>
                <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputAmount" class="col-form-label">Amount</label>
              <input id="inputAmount" type="text" name="amount" placeholder="Enter Amount"  value="{{old('amount')}}" class="form-control">
              @error('amount')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
            <input id="inputdate" type="hidden" name="month"   value="{{date("F")}}" class="form-control">
          </div>
          <div class="form-group">
            <input id="inputdate" type="hidden" name="date"   value="{{date("d/m/y")}}" class="form-control">
          </div>
          <div class="form-group">
            <input id="inputdate" type="hidden" name="year"   value="{{date("Y")}}" class="form-control">
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
{{--<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>--}}
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