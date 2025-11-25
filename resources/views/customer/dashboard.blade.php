@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto py-6">

    {{-- Judul Dashboard --}}
    <h2 class="text-3xl font-bold mb-6 text-white">Customer Dashboard</h2>

    {{-- Produk Terbaru --}}
    <h3 class="text-xl font-semibold mb-4 text-white">Produk Terbaru</h3>

    @if($products->isEmpty())
        <p class="text-gray-400">Belum ada produk tersedia.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white/10 border border-white/20 rounded-2xl backdrop-blur-xl shadow-lg p-5 flex flex-col justify-between">
                    
                    {{-- Gambar Produk --}}
                    <div class="mb-3">
                        <img 
                            src="{{ $product->image_url ?? 'https://via.placeholder.com/300x200?text=No+Image' }}" 
                            alt="{{ $product->name }}" 
                            class="rounded-lg object-cover h-40 w-full"
                        >
                    </div>

                    {{-- Nama & Harga --}}
                    <div>
                        <h4 class="text-lg font-bold text-white">{{ $product->name }}</h4>
                        <p class="text-green-300 mt-1 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    {{-- Tombol Detail & Wishlist --}}
                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('customer.products.show', $product->id) }}" 
                           class="flex-1 text-center bg-blue-600 hover:bg-blue-700 transition text-white px-3 py-2 rounded-lg font-medium">
                            Detail
                        </a>

                        @if(isset($wishlist) && $wishlist->contains($product->id))
                            <button type="button" 
                                    class="flex-1 w-full bg-gray-600 text-white px-3 py-2 rounded-lg cursor-not-allowed" 
                                    disabled>
                                Sudah di Wishlist
                            </button>
                        @else
                            <form action="{{ route('customer.wishlist.add') }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" 
                                        class="w-full bg-pink-600 hover:bg-pink-700 transition text-white px-3 py-2 rounded-lg font-medium">
                                    Wishlist
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
