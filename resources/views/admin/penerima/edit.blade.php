@extends('layouts.app')

@section('title', 'Edit Penerima Bantuan')

@section('page-title', 'Edit Penerima Bantuan')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb -->
    <nav class="flex text-sm text-gray-600">
        <a href="{{ route('admin.dashboard') }}" class="hover:text-emerald-600">Dashboard</a>
        <span class="mx-2">/</span>
        <a href="{{ route('admin.penerima.index') }}" class="hover:text-emerald-600">Data Penerima</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900 font-medium">Edit</span>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.penerima.update', $penerima->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Calon Penerima -->
            <div class="mb-6">
                <label for="calon_penerima_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Calon Penerima <span class="text-red-500">*</span>
                </label>
                <select name="calon_penerima_id" id="calon_penerima_id" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none {{ $errors->has('calon_penerima_id') ? 'border-red-500' : '' }}">
                    <option value="">Pilih Calon Penerima</option>
                    @foreach($calonPenerimas as $calon)
                        <option value="{{ $calon->id }}" {{ old('calon_penerima_id', $penerima->calon_penerima_id) == $calon->id ? 'selected' : '' }}>
                            {{ $calon->nama }} - {{ $calon->nik }}
                        </option>
                    @endforeach
                </select>
                @error('calon_penerima_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bantuan -->
            <div class="mb-6">
                <label for="bantuan_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Bantuan <span class="text-red-500">*</span>
                </label>
                <select name="bantuan_id" id="bantuan_id" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none {{ $errors->has('bantuan_id') ? 'border-red-500' : '' }}">
                    <option value="">Pilih Bantuan</option>
                    @foreach($bantuans as $bantuan)
                        <option value="{{ $bantuan->id }}" {{ old('bantuan_id', $penerima->bantuan_id) == $bantuan->id ? 'selected' : '' }}>
                            {{ $bantuan->nama }} - {{ $bantuan->kategori }} (Rp {{ number_format($bantuan->nilai, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
                @error('bantuan_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Penerima -->
            <div class="mb-6">
                <label for="status_penerima" class="block text-sm font-medium text-gray-700 mb-2">
                    Status Penerima <span class="text-red-500">*</span>
                </label>
                <select name="status_penerima" id="status_penerima" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none {{ $errors->has('status_penerima') ? 'border-red-500' : '' }}">
                    <option value="">Pilih Status</option>
                    <option value="Proses" {{ old('status_penerima', $penerima->status_penerima) === 'Proses' ? 'selected' : '' }}>Proses</option>
                    <option value="Disetujui" {{ old('status_penerima', $penerima->status_penerima) === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" {{ old('status_penerima', $penerima->status_penerima) === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                @error('status_penerima')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Penyaluran -->
            <div class="mb-6">
                <label for="tanggal_penyaluran" class="block text-sm font-medium text-gray-700 mb-2">
                    Tanggal Penyaluran
                </label>
                <input type="date" 
                       name="tanggal_penyaluran" 
                       id="tanggal_penyaluran" 
                       value="{{ old('tanggal_penyaluran', $penerima->tanggal_penyaluran ? $penerima->tanggal_penyaluran->format('Y-m-d') : '') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none {{ $errors->has('tanggal_penyaluran') ? 'border-red-500' : '' }}">
                @error('tanggal_penyaluran')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Catatan -->
            <div class="mb-6">
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-2">
                    Catatan
                </label>
                <textarea name="catatan" 
                          id="catatan" 
                          rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none {{ $errors->has('catatan') ? 'border-red-500' : '' }}"
                          placeholder="Tambahkan catatan jika diperlukan...">{{ old('catatan', $penerima->catatan) }}</textarea>
                @error('catatan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <a href="{{ route('admin.penerima.index') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200">
                    Perbarui Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection