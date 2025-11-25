<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Tailwind CSS CDN (bisa ganti dengan versi lokal) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-gray-200 flex-shrink-0">
        <div class="p-4 text-center font-bold text-xl border-b border-gray-700">
            Admin Panel
        </div>
        <nav class="mt-4">
            <ul>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2">
                        <i class="fas fa-users"></i> Users
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-2">
                        <i class="fas fa-tags"></i> Categories
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-2">
                        <i class="fas fa-box"></i> Products
                    </a>
                </li>
                <li class="px-4 py-2 hover:bg-gray-700">
                    <!-- Logout menggunakan form POST -->
                    <form action="{{ route('logout') }}" method="POST" class="flex items-center gap-2">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 w-full text-left">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">@yield('title', 'Dashboard')</h1>
            <div>
                <span class="text-gray-700">Hello, {{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
