<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeLeave;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EmployeeLeaveController extends Controller
{
    function index() {
        $leaves = EmployeeLeave::where('employee_id', auth()->user()->id)->get();
        return view('leave.index', compact('leaves'));
    }

    function create() {
        return view('leave.create');
    }

    function store(Request $request){
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required'
        ]);
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $currentDate = $start_date->copy();
        $dates = [];
        $monthCounts = [];
        while ($currentDate->lte($end_date)) {
            $dates[] = $currentDate->toDateString();
            $month = $currentDate->format('Y-m');
            if (!isset($monthCounts[$month])) {
                $monthCounts[$month] = 1;
                } else {
                $monthCounts[$month] += 1;
            }
            $currentDate->addDay();
        }
        foreach ($monthCounts as $key => $monthCount) {
            if($monthCount > 1) {
                return redirect()->back()->with('error', 'Employees can not take more than 1 leave in a month.');
            }
        }

        $user = auth()->user();
        $startcurrentMonth = date('m', strtotime($request->start_date));
        
        $leavesThisMonth = EmployeeLeave::where('employee_id', $user->id)
                                ->whereMonth('start_date', $startcurrentMonth)
                                ->count();
        if($leavesThisMonth >= 1) {
            return redirect()->back()->with('error', 'Your already taken leave in this month.');
        }

        EmployeeLeave::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'employee_id' => auth()->user()->id
        ]);

        $companyusers = User::whereHas('role', function ($query) {
            $query->where('name', 'company');
        })->get();
        foreach ($companyusers as $companyUser) {
            Mail::send('leave-mail', ['name' => $user->name, 'start_date' => $request->start_date, 'end_date' => $request->end_date, 'reason' => $request->reason], function ($message) use ($companyUser) {
                $message->to($companyUser->email)->subject('Leave application.');
            });
        }
        return redirect()->route('leave.index');
    }

    function destroy($id){
        $leave = EmployeeLeave::find($id);
        $leave->delete();
        return redirect()->route('leave.index');
    }

    function employeeLeaveIndex(){
        $leaves = EmployeeLeave::all();
        return view('employee-leave.index', compact('leaves'));
    }

    function employeeLeaveEdit($id){
        $leave = EmployeeLeave::find($id);
        return view('employee-leave.edit', compact('leave'));
    }
    function employeeLeaveUpdate($id, Request $request){
        $request->validate([
            'status' => 'required',
        ]);
        $leave = EmployeeLeave::find($id);
        $leave->status = $request->status;
        $leave->save();
        $employee = $leave->employee; 
        Mail::send('employee-leave-mail', ['name' => $employee->name, 'status' => $request->status], function ($message) use ($employee) {
            $message->to($employee->email)->subject('Leave application.');
        });
        return redirect()->route('employee-leave.index');

    }
}
