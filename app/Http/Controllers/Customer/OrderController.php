<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade as Cart; // gunakan CartFacade
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Tampilkan daftar order
    public function index()
    {
        $user = Auth::user();
        $orders = Order::with('items.product')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('customer.orders.index', compact('orders'));
    }

    // Checkout: Buat order baru dari cart
    public function store(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::getContent(); // ambil semua item dari cart

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart.index')
                ->with('error', 'Keranjang kosong!');
        }

        DB::beginTransaction();
        try {
            // Hitung total
            $totalPrice = $cartItems->sum(fn($item) => $item->price * $item->quantity);

            // Buat order baru
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . Str::upper(Str::random(8)),
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            // Simpan item order
            foreach ($cartItems as $item) {
                $order->items()->create([
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }

            // Kosongkan cart
            Cart::clear();

            DB::commit();

            return redirect()->route('customer.orders.index')
                ->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('customer.cart.index')
                ->with('error', 'Terjadi kesalahan saat checkout.');
        }
    }
}
