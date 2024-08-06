<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Invitation;
use App\Models\Brand;

class CompanyEmployeeController extends Controller
{
    public function create(Request $request)
    {
        if($request->session()->has('brand')) {
            $request->session()->forget('brand');
        }

        $employee = Employee::where('email', auth()->user()->email)->first();

        $companyowners = Employee::where('affiliation', $employee->affiliation)->where('role', 'company_owner')->orderBy('employee_id', 'desc')->get();
        $brandowners = Employee::where('affiliation', $employee->affiliation)->where('role', 'brand_owner')->orderBy('employee_id', 'desc')->get();
        $members = Employee::where('affiliation', $employee->affiliation)->where('role', 'member')->orderBy('employee_id', 'desc')->get();

        $company = $request->session()->get('company');
        $brands = Brand::where('company', $company)->orderBy('name', 'desc')->get();

        return view('company.company-employee', compact('companyowners', 'brandowners', 'members', 'company', 'brands'));
    }

    public function update_employee(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'employee_id' => 'required',
            'role' => 'required|in:company_owner,brand_owner,member',
            'affiliation_secondary' => 'required',
        ]);

        // Retrieve the existing employee record
        $employee = Employee::find($request->email);
        if (!$employee) {
            return redirect()->back()->withErrors(['employee_id' => 'Employee not found']);
        }

        // Update the existing employee record
        $employee->employee_id = $request->employee_id;
        $employee->affiliation_secondary = $request->affiliation_secondary;
        $employee->role = $request->role;
        $employee->save();

        // Specify a valid route for the redirect
        return redirect()->back();
    }

    public function delete_employee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->action([CompanyEmployeeController::class, 'create']);
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

        return redirect()->action([CompanyEmployeeController::class, 'create']);
    }

    public function search_employee(Request $request)
    {
        $company = $request->session()->get('company');
        $brands = Brand::where('company', $company)->orderBy('name', 'desc')->get();

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
            ->where('role', 'member')
            ->where(function ($query) use ($searchTerm) {
                $query->where('employee_id', 'like', $searchTerm)
                    ->orWhere('firstname', 'like', $searchTerm)
                    ->orWhere('middlename', 'like', $searchTerm)
                    ->orWhere('lastname', 'like', $searchTerm);
            })
            ->orderBy('employee_id', 'desc')
            ->get();

        return view('company.company-employee', compact('companyowners', 'brandowners', 'members', 'company', 'brands'));
    }
}