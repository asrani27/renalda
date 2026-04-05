<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-74 bg-gradient-to-b from-emerald-800 to-emerald-900 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 bg-emerald-950/50">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                            <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                            <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                            <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                        </svg>
                    </div>
                    <span class="text-white font-bold text-lg">Admin Panel</span>
                </div>
                <!-- Mobile Close Button -->
                <button id="closeSidebar" class="lg:hidden text-white hover:text-emerald-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-6 px-3">
                <ul class="space-y-1">

                    <!-- Dashboard -->
                    <li>
                        <a href="{{ auth()->check() && auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>

                    <!-- Data Pendamping -->
                    <li>
                        <a href="{{ route('admin.pendamping.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.pendamping.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span class="font-medium">Data Pendamping</span>
                        </a>
                    </li>

                    <!-- Data Bantuan -->
                    <li>
                        <a href="{{ route('admin.bantuan.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.bantuan.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="font-medium">Data Bantuan</span>
                        </a>
                    </li>

                    <!-- Data Calon Penerima Bantuan -->
                    <li>
                        <a href="{{ route('admin.calonpenerima.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.calonpenerima.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <span class="font-medium">Data Calon Penerima</span>
                        </a>
                    </li>

                    <!-- Data Penerima Bantuan -->
                    <li>
                        <a href="{{ route('admin.penerima.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.penerima.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <span class="font-medium">Data Penerima Bantuan</span>
                        </a>
                    </li>

                    <!-- Jadwal Penyaluran -->
                    <li>
                        <a href="{{ route('admin.jadwalpenyaluran.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.jadwalpenyaluran.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="font-medium">Jadwal Penyaluran</span>
                        </a>
                    </li>


                    <!-- Penyaluran Bantuan-->
                    <li>
                        <a href="{{ route('admin.penyaluranbantuan.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.penyaluranbantuan.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="font-medium"> Penyaluran Bantuan</span>
                        </a>
                    </li>

                    <!-- Serah Terima Bantuan-->
                    <li>
                        <a href="{{ route('admin.serahterima.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.serahterima.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="font-medium"> Serah Terima Bantuan</span>
                        </a>
                    </li>

                    <!-- Monitoring-->
                    <li>
                        <a href="{{ route('admin.monitoring.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.monitoring.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="font-medium">Monitoring</span>
                        </a>
                    </li>

                    <!-- Laporan -->
                    <li>
                        <a href="{{ route('admin.laporan.index') }}"
                            class="flex items-center gap-3 px-4 py-3 text-white rounded-lg hover:bg-emerald-700/50 transition-all duration-200 {{ request()->routeIs('admin.laporan.*') ? 'bg-emerald-700 shadow-lg' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="font-medium">Laporan</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <li class="pt-4 pb-2">
                        <div class="border-t border-emerald-700/50"></div>
                    </li>

                    <!-- Logout -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-3 px-4 py-3 text-red-300 rounded-lg hover:bg-red-900/30 hover:text-red-200 transition-all duration-200 w-full text-left"
                                onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin keluar dari aplikasi?')) { document.getElementById('logoutForm').submit(); }">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span class="font-medium">Logout</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </nav>

            <!-- Sidebar Footer -->
            <div class="absolute bottom-0 left-0 right-0 p-4 bg-emerald-950/50">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold">
                        A
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">Admin</p>
                        <p class="text-emerald-300 text-xs">Administrator</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Mobile Menu Button -->
                    <button id="openSidebar" class="lg:hidden text-gray-600 hover:text-gray-900 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Page Title -->
                    <h1 class="text-xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>

                    <!-- User Menu -->
                    <div class="flex items-center gap-4">
                        <button class="relative text-gray-600 hover:text-gray-900 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                            <span
                                class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-white text-xs flex items-center justify-center">3</span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

        </div>

        <!-- Overlay for mobile sidebar -->
        <div id="overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden"></div>
    </div>

    <!-- Scripts -->
    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const overlay = document.getElementById('overlay');

        function openSidebarMenu() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebarMenu() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        openSidebar.addEventListener('click', openSidebarMenu);
        closeSidebar.addEventListener('click', closeSidebarMenu);
        overlay.addEventListener('click', closeSidebarMenu);

        // Close sidebar on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeSidebarMenu();
            }
        });
    </script>

    @stack('scripts')
</body>

</html>