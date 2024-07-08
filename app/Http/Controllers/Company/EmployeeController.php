<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Invitation;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $workforce = Employee::where('affiliation', $request->affiliation)->get();

        $administrators = $workforce->where('role', 'administrator');
        $employees = $workforce->where('role', 'employee');

        return view('company.employee.index', compact('administrators', 'employees'));
    }

    public function invite()
    {
        return view('company.employee.invite');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:administrator,employee',
        ]);

        $invitation = new Invitation();
        $invitation->email = $request->email;
        $invitation->affiliation = $request->affiliation;
        $invitation->role = $request->role;
        $invitation->save();

        return redirect()->route('employee.index');
    }
}