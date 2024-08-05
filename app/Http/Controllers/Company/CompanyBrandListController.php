<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Brand;

class CompanyBrandListController extends Controller
{
    public function create(Request $request)
    {
        if($request->session()->has('brand')) {
            $request->session()->forget('brand');
        }

        $company = $request->session()->get('company');
        $employee = Employee::where('email', auth()->user()->email)->first();

        if($employee->role == 'company_owner') {
            $brands = Brand::where('company', $company)->orderBy('name', 'desc')->get();
        } else {
            $brands = Brand::where('company', $company)->where('name', $employee->affiliation_secondary)->orderBy('name', 'desc')->get();
        }

        return view('company.company-brandlist', compact('brands'));
    }

    public function select_brand(Request $request)
    {
        $request->session()->put('brand', $request->brand_name);

        return redirect()->route('brand.dashboard.create');
    }
}