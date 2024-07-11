<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Invitation;

class CompanyEmployeeController extends Controller
{
    public function create(Request $request)
    {
        $email = session('email', $request->email);

        $employee = Employee::where('email', $email)->first();

        $companyowners = Employee::where('affiliation', $employee->affiliation)->where('role', 'company_owner')->orderBy('employee_id', 'desc')->get();
        $brandowners = Employee::where('affiliation', $employee->affiliation)->where('role', 'brand_owner')->orderBy('employee_id', 'desc')->get();
        $members = Employee::where('affiliation', $employee->affiliation)->where('role', 'member')->orderBy('employee_id', 'desc')->get();
        return view('company.company-employee', compact('companyowners', 'brandowners', 'members'));
    }

    public function store_invitation(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:brand_owner,member',
        ]);

        $invitation = new Invitation();
        $invitation->email = $request->email;
        $invitation->employee_id = $request->employee_id;
        $invitation->affiliation = $request->affiliation;
        $invitation->role = $request->role;
        $invitation->save();

        $request->session()->flash('email', $request->user_email);

        return redirect()->action([CompanyEmployeeController::class, 'create']);
    }
}