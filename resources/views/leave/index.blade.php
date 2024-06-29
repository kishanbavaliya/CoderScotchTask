@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-auto ms-auto mt-5 pe-0 mb-5">
            <div class="btn-list">
                <a href="{{ route('leave.create') }}" class="btn btn-primary btn-sm me-1">
                    Add
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Leave Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $leave)
                    <tr>
                        <td>{{$leave->employee->name}}</td>
                        <td>{{$leave->start_date }} to {{$leave->end_date }}</td>
                        <td>{{$leave->reason }}</td>
                        <td>{{$leave->status ?? '-' }}</td>
                        <td>
                            @if($leave->status == null)
                                <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" class="btn">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to delete this item?');">
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection