<div class="sidebar d-flex flex-column p-3 text-light" 
     style="
        width: 240px; 
        height: 100vh; 
        background: #121212; 
        border-right: 1px solid #2a2a2a;
     ">

    <h4 class="text-white mb-4">Menu</h4>

    <ul class="nav nav-pills flex-column mb-auto">

        @if(Auth::user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" 
                   href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
                   href="{{ route('admin.users.index') }}">
                    Users
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" 
                   href="{{ route('admin.categories.index') }}">
                    Categories
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" 
                   href="{{ route('admin.products.index') }}">
                    Products
                </a>
            </li>
        @endif


        @if(Auth::user()->role === 'vendor')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}" 
                   href="{{ route('vendor.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('vendor.products.*') ? 'active' : '' }}" 
                   href="{{ route('vendor.products.index') }}">
                    My Products
                </a>
            </li>
        @endif


        @if(Auth::user()->role === 'customer')
            <li>
                <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}" 
                   href="{{ route('orders.index') }}">
                    My Orders
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('cart.*') ? 'active' : '' }}" 
                   href="{{ route('cart.index') }}">
                    Cart
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('wishlist.*') ? 'active' : '' }}" 
                   href="{{ route('wishlist.index') }}">
                    Wishlist
                </a>
            </li>
        @endif

    </ul>
</div>

<style>
    .sidebar .nav-link {
        color: #bbbbbb;
        padding: 10px 15px;
        border-radius: 8px;
        transition: 0.25s;
        font-size: 15px;
    }

    .sidebar .nav-link:hover {
        background: #1f1f1f;
        color: #fff;
    }

    .sidebar .nav-link.active {
        background: #0ea5e9 !important; /* elegant cyan-blue */
        color: white !important;
        font-weight: 600;
        box-shadow: 0 0 8px rgba(14,165,233,0.4);
    }
</style>
