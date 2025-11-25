<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('vendor_id', Auth::id())->get();
        return view('vendor.products.index', compact('products'));
    }

    public function create()
    {
        return view('vendor.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create([
            'vendor_id' => Auth::id(),
            'name'      => $request->name,
            'price'     => $request->price,
            'stock'     => $request->stock,
        ]);

        return redirect()->route('vendor.products.index')->with('success', 'Product created successfully.');
    }

    // ✅ Method edit
    public function edit($id)
    {
        $product = Product::where('vendor_id', Auth::id())->findOrFail($id);
        return view('vendor.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('vendor_id', Auth::id())->findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->only('name', 'price', 'stock'));

        return redirect()->route('vendor.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::where('vendor_id', Auth::id())->findOrFail($id);
        $product->delete();

        return redirect()->route('vendor.products.index')->with('success', 'Product deleted successfully.');
    }
}
