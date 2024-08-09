<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class BrandProofOfPaymentController extends Controller
{
    public function create(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');
        $payments = Payment::where('company', $company)->where('brand', $brand)->orderBy('created_at', 'desc')->get();

        return view('brand.brand-proof-of-payment', compact('company', 'brand', 'payments'));
    }
}