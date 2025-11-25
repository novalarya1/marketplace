@extends('layouts.vendor')

@section('title', 'Edit Product')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Product</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('vendor.products.update', $product->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Product Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block font-semibold mb-1">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock -->
        <div class="mb-4">
            <label for="stock" class="block font-semibold mb-1">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('stock')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Update Product
            </button>
            <a href="{{ route('vendor.products.index') }}"
               class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">
               Cancel
            </a>
        </div>
    </form>
</div>
@endsection
