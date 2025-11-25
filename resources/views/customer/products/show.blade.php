@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="card bg-dark text-white border-0 shadow-lg rounded-4 p-4">

        <h2 class="mb-4 fw-bold">{{ $product->name }}</h2>

        <div class="row g-4">

            <!-- Product Image -->
            <div class="col-md-6 d-flex justify-content-center">
                <div class="p-3 bg-secondary rounded-4 shadow-sm" style="width: 100%; max-width: 350px;">
                    <img 
                        src="{{ $product->image_url ?? 'https://via.placeholder.com/400' }}" 
                        class="img-fluid rounded-3"
                        alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">

                <h4 class="fw-semibold text-light mb-2">
                    Harga: 
                    <span class="text-info">
                        Rp {{ number_format($product->price) }}
                    </span>
                </h4>

                <p class="text-muted">
                    Stock: <span class="text-light">{{ $product->stock }}</span>
                </p>

                <p class="mt-3 text-light">
                    {{ $product->description }}
                </p>

                <!-- Add to Cart Form -->
                <form action="{{ route('customer.cart.store') }}" method="POST" class="mt-4">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    {{-- Quantity --}}
                    <label class="form-label text-light">Jumlah</label>
                    <input type="number" name="quantity" class="form-control w-50 mb-3"
                           min="1" value="1" required>

                    {{-- Notes --}}
                    <label class="form-label text-light">Catatan (optional)</label>
                    <textarea name="notes" class="form-control mb-3" rows="2"
                        placeholder="Contoh: bungkus terpisah, pedas sedang">{{ old('notes') }}</textarea>

                    <button class="btn btn-success px-4 py-2 rounded-3 shadow-sm">
                        <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                    </button>
                </form>

            </div>
        </div>

    </div>

</div>
@endsection
