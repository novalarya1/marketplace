<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index() { return view('vendor.products.index', ['products' => Product::all()]); }

    public function create() { return view('vendor.products.create'); }

    public function store(ProductRequest $request)
    {
        Product::create($request->validated());
        return back()->with('success', 'Product created');
    }
}
