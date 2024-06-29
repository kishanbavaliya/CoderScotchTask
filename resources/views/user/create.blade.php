@extends('app')
@section('content')
<section class="h-100 h-custom gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-12">
                <div class="p-5">
                  <h3 class="fw-normal mb-5 text-center" style="color: #4835d4;">Add Employee</h3>
                  <form action="{{ route('employee.store') }}" method="POST">
                    @method('post')
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="name">Name</label>
                          <input type="text" id="name" name="name" placeholder="Enter name." value="{{ old('name') }}" class="form-control form-control-lg" required/>
                          @error('name')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="email">Email</label>
                          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email." class="form-control form-control-lg" required/>
                          @error('email')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="email">Password</label>
                          <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Enter password." class="form-control form-control-lg" required/>
                          @error('password')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="designation">Designation</label>
                          <input type="text" id="designation" name="designation" value="{{ old('designation') }}" placeholder="Enter designation." class="form-control form-control-lg" required/>
                          @error('designation')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="joining_date">Joining Date</label>
                          <input type="date" id="joining_date" name="joining_date" value="{{ old('joining_date') }}" class="form-control form-control-lg"/>
                          @error('joining_date')
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
<script>

</script>
@endsection
