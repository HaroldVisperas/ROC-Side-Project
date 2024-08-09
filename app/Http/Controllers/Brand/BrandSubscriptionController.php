<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Cart;

class BrandSubscriptionController extends Controller
{
    public function create(Request $request)
    {
        return view('brand.brand-subscription');
    }

    public function store_cart(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');
        $package = Package::where('name', $request->package_name)->first();

        $cart = new Cart();
        $cart->company = $company;
        $cart->brand = $brand;
        $cart->package_name = $package->name;
        $cart->package_price = $package->base_price;
        $cart->duration = $package->base_duration;
        $cart->total_price = $package->base_price;

        if($existing_cart = Cart::where('company', $company)->where('brand', $brand)->where('package_name', $package->name)->first()) {
            $existing_cart->duration = $existing_cart->duration + $package->base_duration;
            $existing_cart->total_price = $existing_cart->total_price + $package->base_price;
            $existing_cart->save();
        } else {
            $cart = new Cart();
            $cart->company = $company;
            $cart->brand = $brand;
            $cart->package_name = $package->name;
            $cart->package_price = $package->base_price;
            $cart->duration = $package->base_duration;
            $cart->total_price = $package->base_price;
            $cart->save();
        }

        return back();
    }

    public function create_order(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');
        $package = Package::where('name', $request->package_name)->first();

        $cart = new Cart();
        $cart->company = $company;
        $cart->brand = $brand;
        $cart->package_name = $package->name;
        $cart->package_price = $package->base_price;
        $cart->duration = $package->base_duration;
        $cart->total_price = $package->base_price;
        
        $request->session()->flash('single_order', true);
        $request->session()->flash('cart', $cart);
        return redirect()->route('brand.paymentmethod.create');
    }
}