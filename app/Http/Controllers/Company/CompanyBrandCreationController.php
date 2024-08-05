<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Employee;

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
            'description' => 'required',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
        ]);

        $employee = Employee::where('email', $request->user_email)->first();

        $brand = new Brand();
        $brand->company = $employee->affiliation;
        $brand->name = $request->name;
        $brand->description = $request->description;
        if($request->facebook_link) 
            $brand->facebook_link = $request->facebook_link;
        if($request->x_link)
            $brand->x_link = $request->x_link;
        if($request->linkedin_link)
            $brand->linkedin_link = $request->linkedin_link;
        if($request->instagram_link)
            $brand->instagram_link = $request->instagram_link;
        if($request->youtube_link)
            $brand->youtube_link = $request->youtube_link;
        if($request->tiktok_link)
            $brand->tiktok_link = $request->tiktok_link;
        $brand->save();
        
        $request->session()->put('brand', $brand->name);
        return redirect()->route('brand.dashboard.create');
    }
}