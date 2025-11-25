@extends('layouts.vendor')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Produk Baru</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="price" class="block font-semibold mb-1">Harga (Rp)</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="stock" class="block font-semibold mb-1">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block font-semibold mb-1">Gambar Produk</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Tambah Produk
            </button>
        </div>
    </form>
</div>
@endsection
