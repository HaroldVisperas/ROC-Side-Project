<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class CompanyBrandCreationController extends Controller
{
    public function create()
    {
        return view('company.company-brandcreation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'description' => 'required',
            'social_media_link' => 'nullable|url',
        ]);

        $brand = new Brand();

        $brand->fill($request->all());

        $brand->save();
    
        return redirect('/')->with('success', 'Brand details saved successfully!');
    }
}