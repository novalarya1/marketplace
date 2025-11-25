@extends('layouts.guest')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 border border-gray-100">

        <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">
            Login
        </h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-700 border border-red-200 rounded-lg">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input 
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm"
                >
            </div>

            {{-- Password --}}
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input 
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm"
                >
            </div>

            {{-- Remember + Forgot --}}
            <div class="mb-6 flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300">
                    Remember me
                </label>
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Forgot password?
                </a>
            </div>

            {{-- Submit --}}
            <button 
                type="submit"
                class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium shadow-md"
            >
                Login
            </button>
        </form>
    </div>
@endsection
