@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Tambah ke Keranjang</h2>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex gap-4 flex-wrap">

                {{-- Gambar Produk --}}
                <div>
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}"
                         class="rounded border img-fluid"
                         style="max-width: 240px;"
                         alt="{{ $product->name }}">
                </div>

                {{-- Detail Produk --}}
                <div class="flex-grow-1">
                    <h4>{{ $product->name }}</h4>
                    <p class="text-muted">
                        Harga: <strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                    </p>
                    <p>{{ $product->description }}</p>

                    {{-- Tampilkan error validation --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('customer.cart.store') }}" method="POST" class="mt-3">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        {{-- Quantity --}}
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" name="quantity" id="quantity" class="form-control w-25"
                                   min="1" value="{{ old('quantity', 1) }}" required>
                        </div>

                        {{-- Notes --}}
                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan (optional)</label>
                            <textarea name="notes" id="notes" class="form-control" rows="2"
                                placeholder="Contoh: bungkus terpisah, level pedas sedang">{{ old('notes') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-2 px-4">
                            Tambah ke Keranjang
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
