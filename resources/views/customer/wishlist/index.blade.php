@extends('layouts.dashboard')

@section('content')
<div class="container py-4">

    <h2 class="text-2xl font-bold mb-6 text-white">My Wishlist</h2>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    @if(session('info'))
        <div class="alert alert-info mb-4">{{ session('info') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-4">{{ session('error') }}</div>
    @endif

    @if($wishlist->isEmpty())
        <div class="text-center text-gray-400 py-10">
            <h4>Belum ada produk di wishlist</h4>
            <p>Tambahkan produk favoritmu agar mudah diakses nanti.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($wishlist as $item)
                <div class="p-5 bg-white/10 border border-white/20 rounded-2xl backdrop-blur-xl shadow-lg">
                    <img src="{{ $item->product->image_url ?? 'https://via.placeholder.com/150' }}"
                         alt="{{ $item->product->name }}"
                         class="w-full h-48 object-cover rounded-lg mb-3">

                    <h4 class="text-lg font-bold text-white">{{ $item->product->name }}</h4>
                    <p class="text-gray-300 mt-1">Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>

                    <div class="mt-3 flex gap-2">
                        <a href="{{ route('customer.products.show', $item->product->id) }}"
                           class="flex-1 bg-blue-600 px-3 py-2 rounded-lg text-center hover:bg-blue-700 transition">
                           Detail
                        </a>

                        <form action="{{ route('customer.wishlist.destroy', $item->product->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 px-3 py-2 rounded-lg hover:bg-red-700 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
