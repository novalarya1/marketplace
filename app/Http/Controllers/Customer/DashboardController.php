<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();

        return view('customer.dashboard', compact('products'));
    }
}
