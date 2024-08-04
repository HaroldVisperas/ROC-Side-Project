<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandProfileController extends Controller
{
    public function create()
    {
        return view('brand.brand-profile');
    }

    public function edit(Request $request)
    {
        return view('brand.brand-profile-edit');
    }
}