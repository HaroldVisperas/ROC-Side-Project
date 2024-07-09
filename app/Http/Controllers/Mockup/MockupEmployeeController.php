<?php

namespace App\Http\Controllers\Mockup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Invitation;

class MockupEmployeeController extends Controller
{
    public function create(Request $request)
    {
        $administrators = Employee::where('affiliation', $request->affiliation)->where('role', 'administrator')->get();
        $employees = Employee::where('affiliation', $request->affiliation)->where('role', 'employee')->get();

        return view('mockup.company.employee.index', compact('administrators', 'employees'));
    }

    public function create_invitation()
    {
        return view('mockup.company.employee.invite');
    }

    public function store_invitation(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:administrator,employee',
        ]);

        $invitation = new Invitation();
        $invitation->email = $request->email;
        $invitation->employee_id = $request->employee_id;
        $invitation->affiliation = $request->affiliation;
        $invitation->role = $request->role;
        $invitation->save();

        return redirect()->route('mockup.employees.create');
    }
}