<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Checkout;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order_quantities = [];
        $product_quantities = [];
        $checkout_quantities = [];

        foreach (range(1, 12) as $i) {
            array_push($order_quantities, array_sum(Order::whereYear('ordered', now()->year)->whereMonth('ordered', $i)->pluck('quantity')->toArray()));
            array_push($product_quantities, Product::whereYear('arrived', now()->year)->whereMonth('arrived', $i)->thisAttribute('quantity'));
            array_push($checkout_quantities, array_sum(Checkout::whereYear('payment_date', now()->year)->whereMonth('payment_date', $i)->pluck('quantity')->toArray()));

            // array_push($order_quantities, Order::whereYear('ordered', now()->year)->whereMonth('ordered', $i)->sum('quantity'));
            // array_push($product_quantities, Product::whereYear('arrived', now()->year)->whereMonth('arrived', $i)->thisAttribute('quantity'));
            // array_push($checkout_quantities, Checkout::whereYear('payment_date', now()->year)->whereMonth('payment_date', $i)->sum('quantity'));
        }

        return view('backend.dashboard', compact('order_quantities', 'product_quantities', 'checkout_quantities'));
    }
}