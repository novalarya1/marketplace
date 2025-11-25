<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Menampilkan wishlist
    public function index()
    {
        $wishlist = Auth::user()->wishlist()->with('product')->get();
        return view('customer.wishlist.index', compact('wishlist'));
    }

    // Menambahkan produk ke wishlist
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $user = Auth::user();
        $productId = $request->product_id;

        if ($user->wishlist()->where('product_id', $productId)->exists()) {
            return redirect()->back()->with('info', 'Produk sudah ada di wishlist!');
        }

        $user->wishlist()->create([
            'product_id' => $productId
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke wishlist!');
    }

    // Menghapus produk dari wishlist
    public function destroy($productId)
    {
        $user = Auth::user();

        // Cari wishlist berdasarkan product_id
        $wishlistItem = $user->wishlist()->where('product_id', $productId)->first();

        if (!$wishlistItem) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan di wishlist.');
        }

        $wishlistItem->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari wishlist!');
    }
}
