<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Invitation;
use App\Models\User;

class BrandEmployeeController extends Controller
{
    public function create(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');

        $companyowners = Employee::where('affiliation', $company)->where('role', 'company_owner')->orderBy('firstname', 'desc')->get();
        $brandowners = Employee::where('affiliation', $company)->where('affiliation_secondary', $brand)->where('role', 'brand_owner')->orderBy('employee_id', 'desc')->get();
        $members = Employee::where('affiliation', $company)->where('affiliation_secondary', $brand)->where('role', 'member')->orderBy('employee_id', 'desc')->get();

        return view('brand.brand-employee', compact('companyowners', 'brandowners', 'members', 'company', 'brand'));
    }

    public function update_employee(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'employee_id' => 'required',
            'role' => 'required|in:company_owner,brand_owner,member',
        ]);

        // Retrieve the existing employee record
        $employee = Employee::find($request->email);
        $user = User::where('email', $request->email)->first();
        if (!$employee) {
            return redirect()->back()->withErrors(['employee_id' => 'Employee not found']);
        }

        // Update the existing employee record
        $employee->employee_id = $request->employee_id;
        $employee->role = $request->role;
        $employee->save();

        $user->role = $request->role;
        $user->save();

        // Specify a valid route for the redirect
        return redirect()->back();
    }

    public function delete_employee(Request $request)
    {
        $employee = Employee::where('email', $request->employee_email)->first();
        $employee->delete();

        $user = User::where('email', $request->employee_email)->first();
        $user->role = 'individual_client';
        $user->save();
        
        return redirect()->action([BrandEmployeeController::class, 'create']);
    }

    public function cancel_edit_employee()
    {
        return back();
    }

    public function store_invitation(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:brand_owner,member',
        ]);

        $company = $request->session()->get('company');

        $invitation = new Invitation();
        $invitation->email = $request->email;
        $invitation->employee_id = $request->employee_id;
        $invitation->affiliation = $company;
        $invitation->affiliation_secondary = $request->affiliation_secondary;
        $invitation->role = $request->role;
        $invitation->save();

        return redirect()->action([BrandEmployeeController::class, 'create']);
    }

    public function search_employee(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');

        $searchTerm = '%' . $request->search . '%';

        $companyowners = Employee::where('affiliation', $company)
            ->where('role', 'company_owner')
            ->where(function ($query) use ($searchTerm) {
                $query->where('employee_id', 'like', $searchTerm)
                    ->orWhere('firstname', 'like', $searchTerm)
                    ->orWhere('middlename', 'like', $searchTerm)
                    ->orWhere('lastname', 'like', $searchTerm);
            })
            ->orderBy('employee_id', 'desc')
            ->get();
    
        $brandowners = Employee::where('affiliation', $company)
            ->where('affiliation_secondary', $brand)
            ->where('role', 'brand_owner')
            ->where(function ($query) use ($searchTerm) {
                $query->where('employee_id', 'like', $searchTerm)
                    ->orWhere('firstname', 'like', $searchTerm)
                    ->orWhere('middlename', 'like', $searchTerm)
                    ->orWhere('lastname', 'like', $searchTerm);
            })
            ->orderBy('employee_id', 'desc')
            ->get();
    
        $members = Employee::where('affiliation', $company)
            ->where('affiliation_secondary', $brand)
            ->where('role', 'member')
            ->where(function ($query) use ($searchTerm) {
                $query->where('employee_id', 'like', $searchTerm)
                    ->orWhere('firstname', 'like', $searchTerm)
                    ->orWhere('middlename', 'like', $searchTerm)
                    ->orWhere('lastname', 'like', $searchTerm);
            })
            ->orderBy('employee_id', 'desc')
            ->get();

        return view('brand.brand-employee', compact('companyowners', 'brandowners', 'members', 'company', 'brand'));
    }
}