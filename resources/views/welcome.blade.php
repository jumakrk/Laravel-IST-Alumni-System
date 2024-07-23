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
    <link rel="icon" href="{{ asset('images/IST-official-logo.png') }}" type="image/x-icon"> <!-- IST Favicon -->
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
<main class="p-6 bg-white dark:bg-gray-800">
    <section class="text-center my-10">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Welcome to the IST Alumni Network</h1>
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">Connecting graduates of the Institute of Software Technologies since 2004.</p>
    </section>
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 my-10">
        <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Alumni Directory</h2>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Search and connect with fellow alumni. Update your contact information to stay in touch.</p>
            <a href="/login" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-md transition hover:bg-blue-700">View Directory</a>
        </div>
        <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Events</h2>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Stay informed about upcoming alumni events and reunions. Join us and reconnect with your classmates.</p>
            <a href="/login" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-md transition hover:bg-blue-700">View Events</a>
        </div>
        <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Career Support</h2>
            <p class="mt-4 text-gray-600 dark:text-gray-300">Access career resources, job postings, and networking opportunities to advance your career.</p>
            <a href="/login" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded-md transition hover:bg-blue-700">Career Support</a>
        </div>
    </section>
    <section class="my-10 text-center">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Why Join the IST Alumni Network?</h2>
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">Stay connected with your alma mater, leverage networking opportunities, and contribute to the growth of future generations of IST graduates.</p>
    </section>
</main>
<footer class="p-6 bg-black text-white text-center">
    <p>&copy; 2024 Institute of Software Technologies. All rights reserved.</p>
</footer>
</body>
</html>
