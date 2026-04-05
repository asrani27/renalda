@extends('layouts.app')

@section('title', 'Dashboard - Pendamping')

@section('page-title', 'Dashboard Pendamping')

@section('content')
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-6 mb-6 text-white shadow-lg">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, Pendamping!</h2>
        <p class="text-blue-100">Berikut adalah ringkasan aktivitas monitoring usaha ekonomi produktif Anda.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        
        <!-- Total UMKM -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-blue-600 text-sm font-medium bg-blue-50 px-2 py-1 rounded-full">+3</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">12</h3>
            <p class="text-gray-600 text-sm">Total UMKM</p>
        </div>

        <!-- Bantuan Disalurkan -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-emerald-600 text-sm font-medium bg-emerald-50 px-2 py-1 rounded-full">+2</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">8</h3>
            <p class="text-gray-600 text-sm">Bantuan Disalurkan</p>
        </div>

        <!-- Monitoring Selesai -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-purple-600 text-sm font-medium bg-purple-50 px-2 py-1 rounded-full">+5</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">15</h3>
            <p class="text-gray-600 text-sm">Monitoring Selesai</p>
        </div>

        <!-- Laporan Bulan Ini -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <span class="text-orange-600 text-sm font-medium bg-orange-50 px-2 py-1 rounded-full">3 hari</span>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-1">2</h3>
            <p class="text-gray-600 text-sm">Laporan Bulan Ini</p>
        </div>

    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- UMKM List -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Daftar UMKM</h3>
                <a href="#" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Lihat Semua</a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    
                    <!-- UMKM Item 1 -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium">Warung Bu Siti</p>
                                <p class="text-gray-600 text-sm">Desa Sukamaju - Toko Kelontong</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Aktif</span>
                    </div>

                    <!-- UMKM Item 2 -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium">Kerajinan Bambu Pak Ahmad</p>
                                <p class="text-gray-600 text-sm">Desa Maju Jaya - Kerajinan</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Aktif</span>
                    </div>

                    <!-- UMKM Item 3 -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium">Toko Sembako Ibu Rina</p>
                                <p class="text-gray-600 text-sm">Desa Bojong - Toko Kelontong</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">Aktif</span>
                    </div>

                    <!-- UMKM Item 4 -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium">Usaha Kue Basah Bu Dewi</p>
                                <p class="text-gray-600 text-sm">Desa Sukamaju - Kuliner</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-medium rounded-full">Proses</span>
                    </div>

                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Aktivitas Terbaru</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    
                    <!-- Activity Item 1 -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-900 font-medium">Monitoring selesai</p>
                            <p class="text-gray-600 text-sm">Warung Bu Siti - Bulan November</p>
                            <p class="text-gray-400 text-xs mt-1">2 jam yang lalu</p>
                        </div>
                    </div>

                    <!-- Activity Item 2 -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-900 font-medium">UMKM baru ditambahkan</p>
                            <p class="text-gray-600 text-sm">Toko Sembako Ibu Rina</p>
                            <p class="text-gray-400 text-xs mt-1">5 jam yang lalu</p>
                        </div>
                    </div>

                    <!-- Activity Item 3 -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-900 font-medium">Laporan dikirim</p>
                            <p class="text-gray-600 text-sm">Laporan monitoring bulanan</p>
                            <p class="text-gray-400 text-xs mt-1">1 hari yang lalu</p>
                        </div>
                    </div>

                    <!-- Activity Item 4 -->
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-900 font-medium">Jadwal monitoring diperbarui</p>
                            <p class="text-gray-600 text-sm">Jadwal minggu ini disetujui</p>
                            <p class="text-gray-400 text-xs mt-1">2 hari yang lalu</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection