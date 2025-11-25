@extends('layouts.vendor')

@section('content')
<h2 class="text-3xl font-bold mb-6">Vendor Dashboard</h2>

<a href="{{ route('vendor.products.create') }}"
   class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700 mb-4 inline-block">
   Tambah Produk
</a>

<div class="overflow-auto mt-6">
    <table class="w-full text-left bg-white/5 border border-white/10 rounded-xl overflow-hidden">
        <thead class="bg-white/10">
            <tr>
                <th class="p-3">Nama Produk</th>
                <th class="p-3">Harga</th>
                <th class="p-3">Stock</th>
                <th class="p-3"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $p)
            <tr class="border-b border-white/10">
                <td class="p-3">{{ $p->name }}</td>
                <td class="p-3">Rp {{ number_format($p->price) }}</td>
                <td class="p-3">{{ $p->stock }}</td>
                <td class="p-3">
                    <a href="{{ route('vendor.products.edit', $p->id) }}"
                       class="text-yellow-300">Edit</a>

                    <form action="{{ route('vendor.products.destroy', $p->id) }}"
                          method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-400 ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
