<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class BrandDashboardController extends Controller
{
    public function create(Request $request)
    {
        $member = Employee::where('email', auth()->user()->email)->first();

        if(auth()->user()->role === 'member') {
            $request->session()->put('company', $member->affiliation);
            $request->session()->put('brand', $member->affiliation_secondary);
        }
        
        return view('brand.brand-dashboard');
    }
}