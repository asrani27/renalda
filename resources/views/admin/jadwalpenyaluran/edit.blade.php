@extends('layouts.app')

@section('title', 'Edit Jadwal Penyaluran')

@section('page-title', 'Edit Jadwal Penyaluran')

@section('content')
<div class="mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.jadwalpenyaluran.update', $jadwalpenyaluran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Error Messages -->
            @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Data Jadwal Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">
                    Data Jadwal Penyaluran
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Jadwal <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" 
                            value="{{ old('nama', $jadwalpenyaluran->nama) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                            placeholder="Masukkan nama jadwal penyaluran">
                    </div>

                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal" name="tanggal" 
                            value="{{ old('tanggal', $jadwalpenyaluran->tanggal->format('Y-m-d')) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                    </div>

                    <div>
                        <label for="pendamping_id" class="block text-sm font-medium text-gray-700 mb-1">
                            Pendamping
                        </label>
                        <select id="pendamping_id" name="pendamping_id" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                            <option value="">-- Pilih Pendamping --</option>
                            @foreach($pendamping as $p)
                                <option value="{{ $p->id }}" {{ old('pendamping_id', $jadwalpenyaluran->pendamping_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }} - {{ $p->kecamatan }}
                                </option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Pilih pendamping yang bertugas</p>
                    </div>

                    <div class="md:col-span-2">
                        <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">
                            Lokasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="lokasi" name="lokasi" 
                            value="{{ old('lokasi', $jadwalpenyaluran->lokasi) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                            placeholder="Masukkan lokasi penyaluran">
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <a href="{{ route('admin.jadwalpenyaluran.index') }}"
                    class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-center">
                    Kembali
                </a>
                <button type="submit"
                    class="flex-1 px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection