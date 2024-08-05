<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandTicketController extends Controller
{
    public function create()
    {
        return view('brand.brand-ticket');
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'work_email' => 'required|email',
            'message' => 'required',
        ]);

        FormEntry::create($request->all());

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}