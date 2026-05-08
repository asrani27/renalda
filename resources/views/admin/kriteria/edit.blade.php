@extends('layouts.app')

@section('title', 'Edit Data Kriteria')

@section('page-title', 'Edit Data Kriteria')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.kriteria.update', $kriteria->id) }}" method="POST">
            @csrf
            @method('PUT')

            @error('nama')
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-800">{{ $message }}</p>
                </div>
            @enderror

            @error('bobot')
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-800">{{ $message }}</p>
                </div>
            @enderror

            <div class="space-y-6">
                <!-- Nama Kriteria -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Kriteria <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           value="{{ old('nama', $kriteria->nama) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                           placeholder="Masukkan nama kriteria">
                </div>

                <!-- Bobot -->
                <div>
                    <label for="bobot" class="block text-sm font-medium text-gray-700 mb-2">Bobot (%) <span class="text-red-500">*</span></label>
                    <input type="number" 
                           id="bobot" 
                           name="bobot" 
                           value="{{ old('bobot', $kriteria->bobot) }}"
                           required
                           min="0"
                           max="100"
                           step="0.01"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                           placeholder="Masukkan bobot (0-100)">
                    <p class="mt-1 text-sm text-gray-500">Masukkan nilai antara 0 dan 100</p>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('admin.kriteria.index') }}" 
                       class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-center">
                        Batal
                    </a>
                    <button type="submit" 
                            class="flex-1 px-4 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection