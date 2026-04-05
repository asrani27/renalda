@extends('layouts.app')

@section('title', 'Detail Penerima Bantuan')

@section('page-title', 'Detail Penerima Bantuan')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb -->
    <nav class="flex text-sm text-gray-600">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-emerald-600">Dashboard</a>
        <span class="mx-2">/</span>
        <a href="{{ route('admin.penerima.index') }}" class="hover:text-emerald-600">Data Penerima</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900 font-medium">Detail</span>
    </nav>

    <!-- Detail Card -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <!-- Status Badge -->
        <div class="flex justify-between items-start mb-6">
            <div>
                @if($penerima->status_penerima === 'Disetujui')
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Disetujui
                    </span>
                @elseif($penerima->status_penerima === 'Ditolak')
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Ditolak
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        Proses
                    </span>
                @endif
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.penerima.edit', $penerima->id) }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.penerima.index') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Calon Penerima Info -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Informasi Penerima
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                <div>
                    <p class="text-sm text-gray-500">Nama</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->calonPenerima->nama }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">NIK</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->calonPenerima->nik }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Usaha</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->calonPenerima->usaha }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Telepon</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->calonPenerima->telp ?? '-' }}</p>
                </div>
                <div class="md:col-span-2">
                    <p class="text-sm text-gray-500">Alamat</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->calonPenerima->alamat }}</p>
                </div>
            </div>
        </div>

        <!-- Bantuan Info -->
        <div class="mb-8">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Informasi Bantuan
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 rounded-lg p-4">
                <div>
                    <p class="text-sm text-gray-500">Nama Bantuan</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->bantuan->nama }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Kategori</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->bantuan->kategori }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Nilai Bantuan</p>
                    <p class="text-base font-semibold text-emerald-600">Rp {{ number_format($penerima->bantuan->nilai, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Sumber Dana</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->bantuan->sumber }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tahun</p>
                    <p class="text-base font-medium text-gray-900">{{ $penerima->bantuan->tahun }}</p>
                </div>
                <div class="md:col-span-1">
                    <p class="text-sm text-gray-500">Tanggal Penyaluran</p>
                    <p class="text-base font-medium text-gray-900">
                        {{ $penerima->tanggal_penyaluran ? $penerima->tanggal_penyaluran->format('d/m/Y') : '-' }}
                    </p>
                </div>
                @if($penerima->bantuan->deskripsi)
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Deskripsi Bantuan</p>
                        <p class="text-base font-medium text-gray-900">{{ $penerima->bantuan->deskripsi }}</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Catatan -->
        @if($penerima->catatan)
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Catatan
                </h3>
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                    <p class="text-gray-700">{{ $penerima->catatan }}</p>
                </div>
            </div>
        @endif

        <!-- Pendamping Info -->
        @if($penerima->calonPenerima->pendamping)
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Pendamping
                </h3>
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            {{ substr($penerima->calonPenerima->pendamping->nama, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-base font-medium text-gray-900">{{ $penerima->calonPenerima->pendamping->nama }}</p>
                            <p class="text-sm text-gray-500">{{ $penerima->calonPenerima->pendamping->jabatan ?? 'Pendamping' }} - {{ $penerima->calonPenerima->pendamping->unit_kerja ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Timestamps -->
        <div class="border-t border-gray-200 pt-4">
            <div class="flex gap-8 text-sm text-gray-500">
                <div>
                    <p class="font-medium">Dibuat pada:</p>
                    <p>{{ $penerima->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <p class="font-medium">Terakhir diperbarui:</p>
                    <p>{{ $penerima->updated_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection