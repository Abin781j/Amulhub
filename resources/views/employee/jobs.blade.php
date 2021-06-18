<!DOCTYPE html>
<html lang="en">

<head>
  <title>AMULHUB || Employee Job Portal</title>
  @include('backend.layouts.head')

</head>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Apply for Job!</h1>
                  </div>
                  
                  @if ($message = Session::get('success'))

                  <div class="alert alert-success alert-block">
          
                      <button type="button" class="close" data-dismiss="alert">×</button>
          
                          <strong>{{ $message }}</strong>
          
                  </div>
          
                  <img src="uploads/{{ Session::get('file') }}">
          
                  @endif
          
            
          
                  @if (count($errors) > 0)
          
                      <div class="alert alert-danger">
          
                          <strong>Whoops!</strong> There were some problems with your input.
          
                          <ul>
          
                              @foreach ($errors->all() as $error)
          
                                  <li>{{ $error }}</li>
          
                              @endforeach
          
                          </ul>
          
                      </div>
          
                  @endif
                  <form method="post" action="{{route('employee.jobsubmit')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="designation">Select Designation</label>
                        @php
                            $designations=DB::table('designations')->select('id','name')->get();
                        @endphp
                          <select name="designation" class="form-control">
                              @foreach($designations as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                          @error('designation')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                          <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Upload Resume <span class="text-danger">*</span></label>
                            <div class="input-group">
                            <input id="thumbnail" class="form-control" type="file" name="file" value="{{old('file')}}">
                          </div>
                          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                            @php
                                $email=Session::get('email');
                                $employee=DB::table('employees')->where(['email'=>$email])->first();
                            @endphp
                            <input type="hidden" name="reg_id" value="{{$employee->id}}">
                          </div>
                          <div class="form-group mb-3">
                             <button class="btn btn-success" type="submit">Upload</button>
                          </div>
                        </form>
                    </div>
                  </form>
                  <hr>
                  </div>            
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>
</html>

      