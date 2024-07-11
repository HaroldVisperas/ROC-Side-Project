<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandDashboardController extends Controller
{
    public function create()
    {
        return view('brand.brand-dashboard');
    }
}