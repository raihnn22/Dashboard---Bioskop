<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemas.id</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 w-64 h-screen bg-gray-900 text-white">
        <a href="/dashboard" class="flex items-center pt-5 p-10 text-xl font-bold">Cinemas.id</a>
        <nav>
            <ul>
                <!-- Navigation -->
                <p class="text-purple-500 px-11 py-2">Navigation</p>
                <li class="mt-3">
                    <details class="group">
                        <summary
                            class="flex items-center space-x-3 p-2 px-11 rounded hover:bg-[#4E71BC] cursor-pointer list-none">
                            <img src="/assets/dashboard.png" alt="File icon" width="24" height="24" />
                            <span>Dashboard</span>
                            <svg class="w-4 h-4 ml-auto transition-transform group-open:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>

                        <ul class="pl-14 mt-1 space-y-1">
                            <li>
                                <a href="{{ route('cities.index') }}" class="block px-4 py-2 rounded hover:bg-[#4E71BC]">Kota</a>
                            </li>
                            <li>
                                <a href="/film" class="block px-4 py-2 rounded hover:bg-[#4E71BC]">Film</a>
                            </li>
                            <li>
                                <a href="{{ route('promos.index') }}" class="block px-4 py-2 rounded hover:bg-[#4E71BC]">Promo</a>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- Elements -->
                <p class="text-purple-500 px-11 py-2 pb-0">Elements</p>
                <p class="text-gray-500 px-11 py-2 pt-0 text-xs">UI Components</p>

                <li>
                    <a href="{{ route('movies.index') }}" class="flex items-center mt-3 space-x-3 p-2 px-11 rounded hover:bg-[#4E71BC]">
                        <img src="/assets/movie.png" alt="File icon" width="24" height="24" />
                        <span>Movie</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('cities.index') }}" class="flex items-center mt-3 space-x-3 p-2 px-11 rounded hover:bg-[#4E71BC]">
                        <img src="/assets/movie.png" alt="File icon" width="24" height="24" />
                        <span>Kota</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('cinemas.index') }}" class="flex items-center mt-3 space-x-3 p-2 px-11 rounded hover:bg-[#4E71BC]">
                        <img src="/assets/movie.png" alt="File icon" width="24" height="24" />
                        <span>Bioskop</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('studios.index') }}" class="flex items-center mt-3 space-x-3 p-2 px-11 rounded hover:bg-[#4E71BC]">
                        <img src="/assets/movie.png" alt="File icon" width="24" height="24" />
                        <span>Studio</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('promos.index') }}" class="flex items-center mt-3 space-x-3 p-2 px-11 rounded hover:bg-[#4E71BC]">
                        <img src="/assets/movie.png" alt="File icon" width="24" height="24" />
                        <span>Promo</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tickets.index') }}" class="flex items-center mt-3 space-x-3 p-2 px-11 rounded hover:bg-[#4E71BC]">
                        <img src="/assets/movie.png" alt="File icon" width="24" height="24" />
                        <span>Tickets</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="ml-64 flex-1">
        <!-- Navbar -->
        <header class="fixed top-0 left-64 right-0 z-10 bg-white shadow p-4 flex justify-between items-center">
            <div>
                <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded">Level</span>
            </div>
            <div class="flex items-center space-x-3">
                <span>{{ Auth::user()->email }}</span>
                <img src="assets/cat.jpg" class="h-10 w-10 rounded-full" alt="Profile">
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6 pt-20">
            @yield('content')
        </main>
    </div>
</body>

</html>