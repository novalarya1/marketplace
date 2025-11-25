@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-gray-800 p-6">
    <div class="w-full max-w-md backdrop-blur-xl bg-white/10 p-8 rounded-2xl border border-white/20 shadow-xl">
        <h2 class="text-3xl font-bold text-white text-center mb-6">Daftar Akun</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label class="text-white">Nama</label>
            <input type="text" name="name" class="w-full p-3 rounded-lg bg-gray-800 text-white border border-gray-700 mb-4" required>

            <label class="text-white">Email</label>
            <input type="email" name="email" class="w-full p-3 rounded-lg bg-gray-800 text-white border border-gray-700 mb-4" required>

            <label class="text-white">Password</label>
            <input type="password" name="password" class="w-full p-3 rounded-lg bg-gray-800 text-white border border-gray-700 mb-4" required>

            <label class="text-white">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full p-3 rounded-lg bg-gray-800 text-white border border-gray-700 mb-4" required>

            <label class="text-white">Pilih Role</label>
            <select name="role" class="w-full p-3 rounded-lg bg-gray-800 text-white border border-gray-700 mb-6">
                <option value="customer">Customer</option>
                <option value="vendor">Vendor</option>
            </select>

            <button class="w-full bg-green-600 hover:bg-green-700 text-white p-3 rounded-lg transition">
                Daftar
            </button>

            <p class="text-center text-gray-300 mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
