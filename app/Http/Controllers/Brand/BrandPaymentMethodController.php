<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Subscription;
use App\Models\Payment;

class BrandPaymentMethodController extends Controller
{
    public function create(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');

        if($request->session()->has('single_order')) {
            $order_quantity = "single";
            $orders = $request->session()->get('cart');
            $total_price = $orders->total_price;
            return view('brand.brand-payment-method', compact('company', 'brand', 'order_quantity', 'orders', 'total_price'));
        }

        $order_quantity = "multiple";
        $orders = Cart::where('company', $company)->where('brand', $brand)->get();
        $total_price = 0;

        foreach($orders as $cart) {
            $total_price = $total_price + $cart->total_price;
        }

        return view('brand.brand-payment-method', compact('company', 'brand', 'order_quantity', 'orders' , 'total_price'));
    }

    public function create_order_confirmation(Request $request)
    {
        $company = $request->session()->get('company');
        $brand = $request->session()->get('brand');

        if($request->order_quantity === "single") 
        {
            if($existing_subscription = Subscription::where('company', $company)->where('brand', $brand)->where('package_name', $request->order_package)->first()) {
                $existing_subscription->duration = $existing_subscription->duration + $request->order_duration;
                $existing_subscription->save();
            } else {
                $subscription = new Subscription();
                $subscription->company = $company;
                $subscription->brand = $brand;
                $subscription->package_name = $request->order_package;
                $subscription->duration = $request->order_duration;
                $subscription->save();
            }

            $payment = new Payment();
            $payment->company = $company;
            $payment->brand = $brand;
            if($request->order_package === "Facebook Plan") {
                $payment->reference_id = uniqid('FB');
            } elseif ($request->order_package === "Youtube Plan") {
                $payment->reference_id = uniqid('YT');
            } elseif ($request->order_package === "X Plan") {
                $payment->reference_id = uniqid('X');
            } elseif ($request->order_package === "Tiktok Plan") {
                $payment->reference_id = uniqid('TK');
            }
            $payment->package_name = $request->order_package;
            $payment->status = "paid";
            $payment->payment_method = $request->payment_method;
            $payment->total_price = $request->order_price;
            $payment->duration = $request->order_duration;
            $payment->save();

            $reference_ids = $payment->reference_id;
        } 
        else 
        {
            $orders = Cart::where('company', $company)->where('brand', $brand)->get();

            foreach($orders as $order) {
                if($existing_subscription = Subscription::where('company', $company)->where('brand', $brand)->where('package_name', $order->package_name)->first()) {
                    $existing_subscription->duration = $existing_subscription->duration + $order->duration;
                    $existing_subscription->save();
                } else {
                    $subscription = new Subscription();
                    $subscription->company = $company;
                    $subscription->brand = $brand;
                    $subscription->package_name = $order->package_name;
                    $subscription->duration = $order->duration;
                    $subscription->save();
                }
    
                $payment = new Payment();
                $payment->company = $company;
                $payment->brand = $brand;
                if($order->package_name === "Facebook Plan") {
                    $payment->reference_id = uniqid('FB');
                } elseif ($order->package_name === "Youtube Plan") {
                    $payment->reference_id = uniqid('YT');
                } elseif ($order->package_name === "X Plan") {
                    $payment->reference_id = uniqid('X');
                } elseif ($order->package_name === "Tiktok Plan") {
                    $payment->reference_id = uniqid('TK');
                }
                $payment->package_name = $order->package_name;
                $payment->status = "paid";
                $payment->payment_method = $request->payment_method;
                $payment->total_price = $order->total_price;
                $payment->duration = $order->duration;
                $payment->save();

                $order->delete();

                $reference_ids[] = $payment->reference_id;
            }
        }

        return view('brand.brand-order-confirmation', compact('reference_ids'));
    }
}