@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Tambah ke Keranjang</h2>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex gap-4">
                {{-- Gambar Produk --}}
                <div>
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}"
                         class="rounded border"
                         style="width: 240px;"
                         alt="{{ $product->name }}">
                </div>

                {{-- Detail Produk --}}
                <div style="flex: 1;">
                    <h4>{{ $product->name }}</h4>
                    <p class="text-muted">
                        Harga: <strong>Rp {{ number_format($product->price) }}</strong>
                    </p>
                    <p>{{ $product->description }}</p>

                    {{-- Form Tambah ke Cart --}}
                    <form action="{{ route('customer.cart.store') }}" method="POST" class="mt-3">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <label class="form-label">Jumlah</label>
                        <input type="number" name="quantity" class="form-control w-25" min="1" value="1" required>

                        <label class="form-label mt-3">Catatan (optional)</label>
                        <textarea name="notes" class="form-control" rows="2"
                            placeholder="Contoh: bungkus terpisah, pedas sedang"></textarea>

                        <button class="btn btn-success mt-4 px-4">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
