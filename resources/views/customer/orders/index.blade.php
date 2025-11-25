@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pesanan Saya</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->isEmpty())
        <p>Belum ada pesanan.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Order Number</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Items</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->order_number }}</td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>
                            <ul>
                                @foreach($order->items as $item)
                                    <li>{{ $item->product->name }} x {{ $item->quantity }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
