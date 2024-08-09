<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class BrandCartController extends Controller
{
    public function create(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');

        $carts = Cart::where('company', $company)->where('brand', $brand)->get();
        $cart_total = 0;

        foreach($carts as $cart) {
            $cart_total = $cart_total + $cart->total_price;
        }
        return view('brand.brand-cart')->with(compact('carts', 'cart_total'));
    }

    public function update_duration(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');
        $cart_id = $request->cart_id;
        $duration_action = $request->duration_action;

        $cart = Cart::where('id', $cart_id)->first();

        if($duration_action === 'add') {
            $cart->duration = $cart->duration + 1;
            $cart->total_price = $cart->package_price * $cart->duration;
            $cart->save();
        } else {
            $cart->duration = $cart->duration - 1;
            $cart->total_price = $cart->package_price * $cart->duration;

            if($cart->duration === 0) {
                $cart->delete();
            } else {
                $cart->save();
            }
        }

        return back();
    }

    public function delete_cart(Request $request)
    {
        $cart_id = $request->cart_id;

        $cart = Cart::where('id', $cart_id)->first();
        $cart->delete();

        return back();
    }
}