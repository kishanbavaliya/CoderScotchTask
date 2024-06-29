@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row pt-5">
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
                        <a href="{{ route('employee-leave.edit', $leave->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection