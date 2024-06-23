<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IST Alumni</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/IST-official-logo.png') }}" type="image/x-icon"> {{-- IST Favicon --}}
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white">
<header class="flex items-center justify-between p-2 bg-black shadow-md w-full">
    <div>
        <img src="{{ asset('images/IST-official-logo.png') }}" alt="IST Logo" class="h-20">
    </div>
    @if (Route::has('login'))
        <nav class="flex gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-3 py-1 rounded-md text-white ring-1 ring-transparent transition hover:text-red-400 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-red-400 dark:focus-visible:ring-white">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="px-3 py-1 rounded-md text-white ring-1 ring-transparent transition hover:text-red-400 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-red-400 dark:focus-visible:ring-white">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-3 py-1 rounded-md text-white ring-1 ring-transparent transition hover:text-red-400 focus:outline-none focus-visible:ring-red-500 dark:text-white dark:hover:text-red-400 dark:focus-visible:ring-white">Register</a>
                @endif
            @endauth
        </nav>
    @endif
</header>
</body>
</html>
