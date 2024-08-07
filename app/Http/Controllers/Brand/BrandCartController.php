<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandCartController extends Controller
{
    public function create(Request $request)
    {
        return view('brand.brand-cart');
    }
}