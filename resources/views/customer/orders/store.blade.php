@extends('layouts.dashboard')

@section('content')
<div class="container py-4">

    <div class="p-6 bg-white/10 border border-white/20 rounded-2xl backdrop-blur-xl shadow-lg text-center">
        <h2 class="text-2xl font-bold text-white mb-4">Pesanan Berhasil!</h2>
        <p class="text-gray-300 mb-4">
            Terima kasih telah melakukan checkout. Berikut detail pesanan Anda:
        </p>

        <div class="text-left bg-white/20 p-4 rounded-lg mb-4">
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> <span class="capitalize">{{ $order->status }}</span></p>

            <h4 class="mt-3 font-bold text-white">Items:</h4>
            <ul class="list-disc list-inside text-gray-300">
                @foreach($order->items as $item)
                    <li>{{ $item->product->name }} x {{ $item->quantity }} (Rp {{ number_format($item->price, 0, ',', '.') }})</li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('customer.orders.index') }}"
           class="inline-block bg-blue-600 px-4 py-2 rounded-lg text-white hover:bg-blue-700 transition">
           Kembali ke Daftar Pesanan
        </a>
    </div>

</div>
@endsection
