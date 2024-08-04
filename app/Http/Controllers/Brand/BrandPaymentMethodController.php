<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandPaymentMethodController extends Controller
{
    public function create()
    {
        return view('brand.brand-payment-method');
    }

    public function create_order_confirmation()
    {
        return view('brand.brand-order-confirmation');
    }
}