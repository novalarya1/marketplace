@extends('layouts.dashboard')

@section('content')
<div class="container py-6">

    {{-- Judul Halaman --}}
    <h2 class="text-2xl font-bold mb-4 text-white">Wishlist</h2>

    {{-- Pesan sukses --}}
    <div class="bg-green-600 text-white p-4 rounded-lg shadow-md mb-4">
        Produk berhasil dihapus dari wishlist!
    </div>

    {{-- Tombol kembali --}}
    <a href="{{ route('customer.wishlist.index') }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
       Kembali ke Wishlist
    </a>

</div>
@endsection
