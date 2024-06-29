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
                  <h3 class="fw-normal mb-5 text-center" style="color: #4835d4;">Update Employee Leave</h3>
                  <form action="{{ route('employee-leave.update', $leave->id) }}" method="POST">
                    @method('post')
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="start_date">Start Date</label>
                          <input type="date" id="start_date" name="start_date" value="{{ $leave->start_date }}" class="form-control form-control-lg" readonly/>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="end_date">End Date</label>
                          <input type="date" id="end_date" name="end_date" value="{{ $leave->end_date }}" class="form-control form-control-lg" readonly/>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="reason">Reason</label>
                          <input type="text" id="reason" name="reason"  value="{{ $leave->reason }}" class="form-control form-control-lg" readonly/>
                          @error('reason')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
                        <div class="form-outline">
                          <label class="form-label" for="status">Status</label>
                          <select name="status" class="form-control form-control-lg">
                            <option value="">Select Status</option>
                            <option value="approved" {{ $leave->status == 'approved' ? 'selected' : ''}}>Approve</option>
                            <option value="declined" {{ $leave->status == 'declined' ? 'selected' : ''}}>Decline</option>
                          </select>
                          @error('status')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <input type="submit" id="formSubmit" class="d-none">
                    <div class="text-center">
                    <label for="formSubmit" class="btn btn-sm btn-primary">Submit</label>
                    <a href="{{ route('employee-leave.index') }}"  class="btn btn-sm btn-primary">Back</a>
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
@endsection
