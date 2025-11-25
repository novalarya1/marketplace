@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6">Edit Kategori</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Kategori</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name', $category->name) }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   required>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.categories.index') }}" 
               class="px-4 py-2 rounded bg-gray-500 text-white hover:bg-gray-600 transition">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
