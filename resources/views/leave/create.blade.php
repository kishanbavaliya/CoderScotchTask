@extends('app')
@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<section class="h-100 h-custom gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-12">
                <div class="p-5">
                  <h3 class="fw-normal mb-5 text-center" style="color: #4835d4;">Add Employee Leave</h3>
                  <form action="{{ route('leave.store') }}" method="POST">
                    @method('post')
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                        <label class="form-label" for="reason">Start Date</label>

                          <div id="start_date" class="input-group date"  data-date-format="yyyy-m-d"> 
                            <input class="form-control" value="{{ old('start_date') }}" name="start_date" type="text" readonly /> 
                            <span class="input-group-addon"> 
                                <i class="glyphicon glyphicon-calendar"></i> 
                            </span> 
                        </div> 
                        @error('start_date')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">  
                        <label class="form-label" for="reason">End Date</label>

                          <div id="end_date" class="input-group date"  data-date-format="yyyy-m-d"> 
                            <input class="form-control" name="end_date" type="text" readonly /> 
                            <span class="input-group-addon"> 
                                <i class="glyphicon glyphicon-calendar"></i> 
                            </span> 
                        </div> 
                        @error('end_date')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="reason">Reason</label>
                          <input type="text" id="reason" name="reason" placeholder="Please enter reason." value="{{ old('reason') }}" class="form-control form-control-lg" required/>
                          @error('reason')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <input type="submit" id="formSubmit" class="d-none">
                    <div class="text-center">
                    <label for="formSubmit" class="btn btn-sm btn-primary">Submit</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> 
<script src="https://code.jquery.com/jquery-3.6.1.min.js" 
        integrity= 
    "sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
        crossorigin="anonymous"> 
    </script> 
    <script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity= 
"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"> 
    </script> 
    <script src= 
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"> 
    </script>
<script>
    $(function () { 
          $("#start_date").datepicker({  
              autoclose: true,  
              todayHighlight: true, 
          }).datepicker('update', new Date()); 
          
          $("#end_date").datepicker({  
              autoclose: true,  
              todayHighlight: true, 
          }).datepicker('update', new Date()); 
      }); 
</script>
@endsection
