<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

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
        return view('brand.brand-profile-edit');
    }
}