@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="text-white mb-4">My Cart</h2>

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        use Darryldecode\Cart\Facades\CartFacade as Cart;
        $cartItems = Cart::getContent();
        $total = Cart::getTotal();
    @endphp

    @if($cartItems->isEmpty())
        <div class="text-center text-muted py-5">
            <h4>Your cart is empty</h4>
            <p>Add some products to start shopping.</p>
        </div>
    @else
        <div class="card bg-dark text-white border-0 shadow rounded-4">
            <div class="card-body">

                {{-- Cart Table --}}
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th width="80">Image</th>
                            <th>Product</th>
                            <th width="120">Price</th>
                            <th width="120">Qty</th>
                            <th width="120">Subtotal</th>
                            <th width="80">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <img src="{{ $item->attributes->image ?? 'https://via.placeholder.com/80' }}"
                                     alt="{{ $item->name }}"
                                     class="img-fluid rounded"
                                     width="60">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('customer.cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number"
                                           name="quantity"
                                           value="{{ $item->quantity }}"
                                           min="1"
                                           class="form-control form-control-sm bg-secondary text-white"
                                           style="width:70px;">
                                    <button type="submit" class="btn btn-sm btn-primary ms-2">Update</button>
                                </form>
                            </td>
                            <td>Rp {{ number_format($item->getPriceSum(), 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('customer.cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">X</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Total Price --}}
                <div class="d-flex justify-content-end mt-3">
                    <h4>Total: <span class="text-info">Rp {{ number_format($total, 0, ',', '.') }}</span></h4>
                </div>

                {{-- Checkout Button --}}
                <div class="d-flex justify-content-end mt-3">
                    <form action="{{ route('customer.orders.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success px-4 py-2">Checkout</button>
                    </form>
                </div>

            </div>
        </div>
    @endif

</div>
@endsection
