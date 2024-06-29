<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\EmployeeDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class EmployeeController extends Controller
{
    function index() {
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'employee');
        })->get();

        return view('user.index', compact('users'));
    }

    function create(){
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', 'max:8', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z\d\s]).*$/']
        ], [
            'password.regex' => 'The password must contain at least one uppercase letter, one digit, and one special character.'
        ]);
        $company_role = Role::where('name', 'employee')->first();
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $company_role->id
        ]);
        EmployeeDetail::create([
            'designation' => $request->designation,
            'joining_date' => $request->joining_date,
            'user_id' => $user->id
        ]);
        return redirect()->route('employee.index');
    }
    
    function destroye($id){
        $user = User::fing($id);
        $employeedetail = EmployeeDetail::where('user_id', $id);
        $user->delete();
        $employeedetail->delete();
        return redirect()->route('employee.index');
    
    }
}
