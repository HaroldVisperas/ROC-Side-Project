<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Employee;

class BrandProfileController extends Controller
{
    public function create(Request $request)
    {
        $company = $request->session()->get('company');
        $brandname = $request->session()->get('brand');

        $brand = Brand::where('company', $company)->where('name', $brandname)->first();

        if($brand->facebook_link === null && $brand->x_link === null && $brand->linkedin_link === null && $brand->instagram_link === null 
            && $brand->youtube_link === null && $brand->tiktok_link === null) { 
            $socmeds = false;

            return view('brand.brand-profile', compact('company', 'brand', 'socmeds'));
        }
        else
        {
            $socmeds = true;

            if($brand->facebook_link !== null) {
                $facebook = true;
            } else {
                $facebook = false;
            }
            if($brand->x_link !== null) {
                $x = true;
            } else {
                $x = false;
            }
            if($brand->linkedin_link !== null) {
                $linkedin = true;
            } else {
                $linkedin = false;
            }
            if($brand->instagram_link !== null) {
                $instagram = true;
            } else {
                $instagram = false;
            }
            if($brand->youtube_link !== null) {
                $youtube = true;
            } else {
                $youtube = false;
            }
            if($brand->tiktok_link !== null) {
                $tiktok = true;
            } else {
                $tiktok = false;
            }

            return view('brand.brand-profile', compact('company', 'brand', 'socmeds', 'facebook', 'x', 'linkedin', 'instagram', 'youtube', 'tiktok'));
        }
    }

    public function edit(Request $request)
    {
        $company = $request->session()->get('company');
        $brandname = $request->session()->get('brand');

        $brand = Brand::where('company', $company)->where('name', $brandname)->first();

        if($brand->facebook_link === null && $brand->x_link === null && $brand->linkedin_link === null && $brand->instagram_link === null 
            && $brand->youtube_link === null && $brand->tiktok_link === null) { 
            $socmeds = false;

            return view('brand.brand-profile-edit', compact('company', 'brand', 'socmeds'));
        }
        else
        {
            $socmeds = true;
            
            if($brand->facebook_link !== null) {
                $facebook = true;
            } else {
                $facebook = false;
            }
            if($brand->x_link !== null) {
                $x = true;
            } else {
                $x = false;
            }
            if($brand->linkedin_link !== null) {
                $linkedin = true;
            } else {
                $linkedin = false;
            }
            if($brand->instagram_link !== null) {
                $instagram = true;
            } else {
                $instagram = false;
            }
            if($brand->youtube_link !== null) {
                $youtube = true;
            } else {
                $youtube = false;
            }
            if($brand->tiktok_link !== null) {
                $tiktok = true;
            } else {
                $tiktok = false;
            }

            return view('brand.brand-profile-edit', compact('company', 'brand', 'socmeds', 'facebook', 'x', 'linkedin', 'instagram', 'youtube', 'tiktok'));
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => 'nullable|mimes:png,jpg,jpeg',
            'description' => 'required|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
        ]);

        $company = $request->session()->get('company');
        $brandname = $request->session()->get('brand');
        $brand = Brand::where('company', $company)->where('name', $brandname)->first();

        if ($request->hasFile('logo')) {
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('assets/uploads/images/'), $imageName);
            $brand->logo = 'assets/uploads/images/' . $imageName;
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        if($request->facebook_link !== null) {
            $brand->facebook_link = $request->facebook_link;
        }
        if($request->x_link !== null) {
            $brand->x_link = $request->x_link;
        }
        if($request->linkedin_link !== null) {
            $brand->linkedin_link = $request->linkedin_link;
        }
        if($request->instagram_link !== null) {
            $brand->instagram_link = $request->instagram_link;
        }
        if($request->youtube_link !== null) {
            $brand->youtube_link = $request->youtube_link;
        }
        if($request->tiktok_link !== null) {
            $brand->tiktok_link = $request->tiktok_link;
        }

        $brand->save();

        $request->session()->forget('brand');
        $request->session()->put('brand', $brand->name);

        return redirect()->route('brand.profile.create')->with('success', 'Brand profile updated successfully.');
    }

    public function delete(Request $request)
    {
        $company = $request->session()->get('company');
        $brandname = $request->session()->get('brand');
        
        $brand = Brand::where('company', $company)->where('name', $brandname)->first();

        $employees = Employee::where('affiliation_secondary', $brandname)->get();

        foreach ($employees as $employee) {
            $employee->affiliation_secondary = $company;
            $employee->save();
        }

        $brand->delete();

        return redirect()->route('company.dashboard.create')->with('success', 'Brand deleted successfully.');
    }
}