@extends('layouts.app')

@section('title', 'Dashboard - Admin Panel')

@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Card -->
<div class="bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-2xl p-6 mb-6 text-white shadow-lg">
    <h2 class="text-2xl font-bold mb-2">Selamat Datang, Admin!</h2>
    <p class="text-emerald-100">Berikut adalah ringkasan data dan aktivitas sistem penyaluran bantuan.</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

    <!-- Data Pendamping -->
    <a href="{{ route('admin.pendamping.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-emerald-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-emerald-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalPendamping }}</h3>
        <p class="text-gray-600 text-sm font-medium">Data Pendamping</p>
    </a>

    <!-- Data Bantuan -->
    <a href="{{ route('admin.bantuan.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalBantuan }}</h3>
        <p class="text-gray-600 text-sm font-medium">Data Bantuan</p>
    </a>

    <!-- Calon Penerima -->
    <a href="{{ route('admin.calonpenerima.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-purple-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-purple-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalCalonPenerima }}</h3>
        <p class="text-gray-600 text-sm font-medium">Calon Penerima</p>
    </a>

    <!-- Penerima Bantuan -->
    <a href="{{ route('admin.penerima.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-indigo-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-indigo-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalPenerima }}</h3>
        <p class="text-gray-600 text-sm font-medium">Penerima Bantuan</p>
    </a>

    <!-- Jadwal Penyaluran -->
    <a href="{{ route('admin.jadwalpenyaluran.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-orange-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-orange-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalJadwalPenyaluran }}</h3>
        <p class="text-gray-600 text-sm font-medium">Jadwal Penyaluran</p>
    </a>

    <!-- Penyaluran Bantuan -->
    <a href="{{ route('admin.penyaluranbantuan.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-teal-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-teal-400 to-teal-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-teal-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalPenyaluranBantuan }}</h3>
        <p class="text-gray-600 text-sm font-medium">Penyaluran Bantuan</p>
    </a>

    <!-- Serah Terima -->
    <a href="{{ route('admin.serahterima.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-cyan-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-cyan-400 to-cyan-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalSerahTerima }}</h3>
        <p class="text-gray-600 text-sm font-medium">Serah Terima</p>
    </a>

    <!-- Monitoring -->
    <a href="{{ route('admin.monitoring.index') }}"
        class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:shadow-pink-500/10 transition-all duration-300 group">
        <div class="flex items-center justify-between mb-4">
            <div
                class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
            </div>
            <svg class="w-5 h-5 text-pink-500 opacity-0 group-hover:opacity-100 transition-opacity" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalMonitoring }}</h3>
        <p class="text-gray-600 text-sm font-medium">Monitoring</p>
    </a>

</div>

@endsection