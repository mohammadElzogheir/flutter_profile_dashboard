<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());
        $employees = Employee::orderBy('name')->get();
        $records = Attendance::where('date', $date)->get()->keyBy('employee_id');
        return view('attendance.index', compact('date','employees','records'));
    }

    public function store(Request $request)
    {
        $date = $request->input('date');
        foreach ($request->input('status', []) as $employeeId => $status) {
            Attendance::updateOrCreate(
                ['employee_id' => $employeeId, 'date' => $date],
                ['status' => $status]
            );
        }
        return back()->with('ok','Attendance saved.');
    }

    public function show(Employee $employee, Request $request)
    {
        $month = $request->input('month', now()->format('Y-m'));
        $start = Carbon::parse($month.'-01')->startOfMonth();
        $end   = (clone $start)->endOfMonth();

        $rows = Attendance::where('employee_id', $employee->id)
                ->whereBetween('date', [$start,$end])
                ->orderBy('date')
                ->get();

        return view('attendance.employee', compact('employee','rows','month','start','end'));
    }

    public function report(Request $request)
    {
        $month = $request->input('month', now()->format('Y-m'));
        $start = Carbon::parse($month.'-01')->startOfMonth();
        $end   = (clone $start)->endOfMonth();

        $employees = Employee::with('department')->orderBy('name')->get();
        $data = Attendance::whereBetween('date', [$start,$end])->get()->groupBy('employee_id');

        return view('attendance.report', compact('month','start','end','employees','data'));
    }
}
