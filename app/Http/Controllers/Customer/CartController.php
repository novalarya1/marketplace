<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        $cart = Cart::getContent();
        return view('customer.cart.index', compact('cart'));
    }

    // Halaman form tambah ke cart
    public function add($id)
    {
        $product = Product::findOrFail($id);
        return view('customer.cart.add', compact('product'));
    }

    // Simpan item ke cart
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'notes'      => 'nullable|string'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Tambah ke cart
        Cart::add([
            'id'       => $product->id,
            'name'     => $product->name,
            'price'    => $product->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'notes' => $request->notes,
                'image' => $product->image_url
            ]
        ]);

        return redirect()->route('customer.cart.index')
                         ->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }

    // Update quantity item
    public function update(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->qty
            ]
        ]);

        return redirect()->route('customer.cart.index')
                         ->with('success', 'Item berhasil diperbarui!');
    }

    // Hapus item dari cart
    public function remove($id)
    {
        Cart::remove($id);

        return redirect()->route('customer.cart.index')
                         ->with('success', 'Item berhasil dihapus dari keranjang!');
    }
}
