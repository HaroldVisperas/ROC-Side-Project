<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Employee;

class IndivCompanyCreationController extends Controller
{
    public function create()
    {
        return view('individual.indiv-companycreation');
    }

    public function store_company(Request $request)
    {
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->address_line_1 = $request->address_line_1;
        $company->address_line_2 = $request->address_line_2;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;
        $company->mobile_number = $request->mobile_number;
        $company->zip_code = $request->zip_code;
        $company->save();

        $user = User::find($request->user_id);
        $user->role = "company_owner";
        $user->save();

        $employee = new Employee();
        $employee->email = $user->email;
        $employee->firstname = $user->firstname;
        $employee->middlename = $user->middlename;
        $employee->lastname = $user->lastname;
        $employee->phone_num = $user->phone_num;
        $employee->affiliation = $request->company_name;
        $employee->role = $user->role;
        $employee->timezone = $user->timezone;
        $employee->save();

        return redirect()->route('individual.dashboard.create')->with('success', 'Company created successfully!');
    }
}