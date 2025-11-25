<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white/90 backdrop-blur-lg border border-gray-200 
                p-8 rounded-2xl shadow-xl shadow-gray-300/40">

        {{-- Tempat Konten --}}
        @yield('content')
    </div>

</body>
</html>
