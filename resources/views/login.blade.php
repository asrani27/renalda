<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Monitoring Usaha Ekonomi Produktif</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gradient-to-br from-emerald-50 via-emerald-100 to-emerald-200 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">

    <!-- Background Pattern - Grid -->
    <svg class="absolute inset-0 w-full h-full opacity-[0.15]" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <pattern id="grid-pattern" width="50" height="50" patternUnits="userSpaceOnUse">
                <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#059669" stroke-width="1" />
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#grid-pattern)" />
    </svg>

    <!-- Decorative Background Elements -->
    <div
        class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-emerald-400/30 to-emerald-500/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
    </div>
    <div
        class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-br from-emerald-400/25 to-emerald-500/15 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2">
    </div>

    <!-- Additional Decorative Circles -->
    <div
        class="absolute top-1/4 left-1/4 w-40 h-40 bg-gradient-to-br from-emerald-400/20 to-emerald-500/10 rounded-full blur-2xl">
    </div>
    <div
        class="absolute top-1/2 right-1/4 w-48 h-48 bg-gradient-to-br from-emerald-400/20 to-emerald-500/10 rounded-full blur-2xl">
    </div>
    <div
        class="absolute bottom-1/3 right-1/3 w-36 h-36 bg-gradient-to-br from-emerald-400/20 to-emerald-500/10 rounded-full blur-2xl">
    </div>

    <!-- Small Floating Circles Pattern -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-emerald-300/30 rounded-full blur-xl">
    </div>
    <div class="absolute top-1/3 right-20 w-16 h-16 bg-emerald-300/25 rounded-full blur-xl">
    </div>
    <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-emerald-300/30 rounded-full blur-xl">
    </div>
    <div class="absolute top-2/3 left-20 w-14 h-14 bg-emerald-300/20 rounded-full blur-xl">
    </div>
    <div class="absolute bottom-1/4 right-10 w-18 h-18 bg-emerald-300/25 rounded-full blur-xl">
    </div>

    <!-- Main Container -->
    <div class="max-w-md w-full relative z-10">
        <!-- Login Card -->
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl p-8 shadow-2xl shadow-emerald-900/10">

            <!-- Logo -->
            <div class="flex flex-col items-center mb-8">
                <div
                    class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/30 mb-4">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-emerald-900 text-center leading-tight">
                    Aplikasi Monitoring<br>Usaha Ekonomi Produktif
                </h1>
                <p class="mt-2 text-sm text-gray-600 text-center">
                    Masuk untuk mengelola usaha ekonomi produktif Anda
                </p>
            </div>

            <!-- Login Form -->
            <form class="space-y-5" action="{{ route('login.post') }}" method="POST">
                @csrf

                @if ($errors->any())
                <div class="bg-red-50 border-2 border-red-200 rounded-xl p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-800">
                                {{ $errors->first('username') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                        Username
                    </label>
                    <input id="username" name="username" type="text" autocomplete="username" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-gray-900 bg-gray-50 placeholder-gray-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 transition-all duration-200"
                        placeholder="Masukkan username">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                        Kata Sandi
                    </label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-gray-900 bg-gray-50 placeholder-gray-400 focus:outline-none focus:border-emerald-500 focus:bg-white focus:ring-4 focus:ring-emerald-500/10 transition-all duration-200"
                        placeholder="••••••••">
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="remember-me" id="remember-me"
                            class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500 cursor-pointer">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>
                    <a href="#"
                        class="text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition-colors duration-200">
                        Lupa kata sandi?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold rounded-xl shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:shadow-emerald-500/40 hover:-translate-y-0.5 focus:outline-none focus:ring-4 focus:ring-emerald-500/20 transition-all duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    Masuk
                </button>

                <!-- Register Link -->
                {{-- <div class="text-center pt-4">
                    <p class="text-sm text-gray-600">
                        Belum punya akun?
                        <a href="#"
                            class="font-semibold text-emerald-600 hover:text-emerald-700 transition-colors duration-200">
                            Daftar sekarang
                        </a>
                    </p>
                </div> --}}
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-500">
                    © {{ date('Y') }} Aplikasi Monitoring Usaha Ekonomi Produktif
                </p>
            </div>
        </div>
    </div>

</body>

</html>