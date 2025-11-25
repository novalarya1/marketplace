<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name', 'Marketplace') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #0f0f0f;
            color: #e5e5e5;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: #151515;
            padding: 20px;
            border-right: 1px solid #222;
            box-shadow: 3px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar h3 {
            font-weight: 600;
            margin-bottom: 25px;
            color: #f5f5f5;
        }

        .sidebar a {
            color: #c9c9c9;
            text-decoration: none;
            display: block;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 8px;
            font-size: 15px;
            transition: 0.25s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #1f1f1f;
            color: #fff;
            border-left: 3px solid #0ea5e9; /* elegant blue */
            padding-left: 12px;
        }

        /* Topnav */
        .topnav {
            margin-left: 240px;
            padding: 15px 25px;
            background: #151515;
            border-bottom: 1px solid #222;
            display: flex;
            align-items: center;
            height: 60px;
        }

        .topnav h5 {
            margin: 0;
            font-weight: 500;
            color: #f5f5f5;
        }

        /* Content */
        .content {
            margin-left: 260px;
            padding: 30px;
            min-height: calc(100vh - 60px);
        }

        /* Logout button */
        .btn-logout {
            background: #d32f2f;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            color: white;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-logout:hover {
            background: #b71c1c;
        }

        /* Card / Panel */
        .card-panel {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 1rem;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>{{ ucfirst(Auth::user()->role) }} Panel</h3>

        @if (Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Users</a>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Categories</a>
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Products</a>
        @endif

        @if (Auth::user()->role === 'vendor')
            <a href="{{ route('vendor.dashboard') }}" class="{{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('vendor.products.index') }}" class="{{ request()->routeIs('vendor.products.*') ? 'active' : '' }}">My Products</a>
        @endif

        @if (Auth::user()->role === 'customer')
            <a href="{{ route('customer.dashboard') }}" class="{{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('customer.cart.index') }}" class="{{ request()->routeIs('customer.cart.*') ? 'active' : '' }}">Cart</a>
            <a href="{{ route('customer.wishlist.index') }}" class="{{ request()->routeIs('customer.wishlist.*') ? 'active' : '' }}">Wishlist</a>
            <a href="{{ route('customer.orders.index') }}" class="{{ request()->routeIs('customer.orders.*') ? 'active' : '' }}">Orders</a>
        @endif

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button class="btn-logout w-100">Logout</button>
        </form>
    </div>

    <!-- Top Navigation -->
    <div class="topnav">
        <h5>Hi, {{ Auth::user()->name }}</h5>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
