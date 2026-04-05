@extends('layouts.app')

@section('title', 'Edit Data Bantuan')

@section('page-title', 'Edit Data Bantuan')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.bantuan.update', $bantuan->id) }}" method="POST">
            @csrf
            @method('PUT')

            @error('nama')
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-800">{{ $message }}</p>
                </div>
            @enderror

            <div class="space-y-6">
                <!-- Nama Bantuan -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Bantuan <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           value="{{ old('nama', $bantuan->nama) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                           placeholder="Masukkan nama bantuan">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" 
                           id="kategori" 
                           name="kategori" 
                           value="{{ old('kategori', $bantuan->kategori) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                           placeholder="Masukkan kategori bantuan">
                </div>

                <!-- Tahun -->
                <div>
                    <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" 
                           id="tahun" 
                           name="tahun" 
                           value="{{ old('tahun', $bantuan->tahun) }}"
                           required
                           min="2000"
                           max="2099"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                           placeholder="Masukkan tahun">
                </div>

                <!-- Nilai -->
                <div>
                    <label for="nilai" class="block text-sm font-medium text-gray-700 mb-2">Nilai (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" 
                           id="nilai" 
                           name="nilai" 
                           value="{{ old('nilai', $bantuan->nilai) }}"
                           required
                           min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                           placeholder="Masukkan nilai bantuan">
                </div>

                <!-- Sumber -->
                <div>
                    <label for="sumber" class="block text-sm font-medium text-gray-700 mb-2">Sumber <span class="text-red-500">*</span></label>
                    <select id="sumber" 
                            name="sumber" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        <option value="">-- Pilih Sumber --</option>
                        <option value="APBD" {{ old('sumber', $bantuan->sumber) === 'APBD' ? 'selected' : '' }}>APBD</option>
                        <option value="HIBAH" {{ old('sumber', $bantuan->sumber) === 'HIBAH' ? 'selected' : '' }}>HIBAH</option>
                    </select>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none resize-none"
                              placeholder="Masukkan deskripsi bantuan (opsional)">{{ old('deskripsi', $bantuan->deskripsi) }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('admin.bantuan.index') }}" 
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