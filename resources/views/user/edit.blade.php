@extends('admin.app')
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
                  <h3 class="fw-normal mb-5 text-center" style="color: #4835d4;">Edit User</h3>
                  <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="name">Name</label>
                          <input type="text" id="name" name="name" value="{{ $user->name ? $user->name : old('name') }}" class="form-control form-control-lg" required/>
                          @error('name')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="email">Email</label>
                          <input type="email" id="email" name="email" value="{{ $user->email ? $user->email : old('email') }}" class="form-control form-control-lg" required/>
                          @error('email')
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
