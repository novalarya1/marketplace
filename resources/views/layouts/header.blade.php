<nav class="bg-white shadow mb-4 p-3 flex justify-between">
    <div class="text-xl font-semibold">Marketplace</div>

    <div>
        <span class="mr-3">{{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>
