@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Semua Produk</h2>

    <div class="row">
        @foreach ($products as $p)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5>{{ $p->name }}</h5>
                    <p>Rp {{ number_format($p->price) }}</p>
                    
                    <a href="{{ route('customer.products.show', $p->id) }}" class="btn btn-primary btn-sm">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>

</div>
@endsection
