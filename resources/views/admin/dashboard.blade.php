@extends('layouts.admin')

@section('content')
<h2 class="text-3xl font-bold mb-6">Admin Dashboard</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <div class="bg-white/10 p-6 rounded-xl shadow">
        <h4 class="text-white font-bold text-lg">Total Users</h4>
        <p class="text-green-400 text-2xl">{{ $usersCount }}</p>
    </div>

    <div class="bg-white/10 p-6 rounded-xl shadow">
        <h4 class="text-white font-bold text-lg">Total Products</h4>
        <p class="text-green-400 text-2xl">{{ $productsCount }}</p>
    </div>

    <div class="bg-white/10 p-6 rounded-xl shadow">
        <h4 class="text-white font-bold text-lg">Total Categories</h4>
        <p class="text-green-400 text-2xl">{{ $categoriesCount }}</p>
    </div>

    <div class="bg-white/10 p-6 rounded-xl shadow">
        <h4 class="text-white font-bold text-lg">Total Orders</h4>
        <p class="text-green-400 text-2xl">{{ $ordersCount }}</p>
    </div>
</div>

@endsection
