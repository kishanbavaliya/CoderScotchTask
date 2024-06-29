@extends('app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-auto ms-auto mt-5 pe-0 mb-5">
            <div class="btn-list">
                <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm me-1">
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
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{ route('employee.destroy', $user->id) }}" method="POST" class="btn">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-sm btn-primary" onclick="return confirm('Are you sure you want to delete this item?');">
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection