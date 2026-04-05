@extends('layouts.app')

@section('title', 'Tambah Calon Penerima Bantuan')

@section('page-title', 'Tambah Calon Penerima Bantuan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.calonpenerima.index') }}" class="text-emerald-600 hover:text-emerald-800 flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Kembali ke Daftar Calon Penerima
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('admin.calonpenerima.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div class="space-y-6">
                <!-- NIK -->
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">NIK <span class="text-red-500">*</span></label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required maxlength="16"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Masukkan 16 digit NIK">
                    @error('nik')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Masukkan nama lengkap">
                    @error('nama')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat <span class="text-red-500">*</span></label>
                    <textarea name="alamat" id="alamat" rows="3" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Usaha -->
                <div>
                    <label for="usaha" class="block text-sm font-medium text-gray-700 mb-2">Jenis Usaha <span class="text-red-500">*</span></label>
                    <input type="text" name="usaha" id="usaha" value="{{ old('usaha') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Masukkan jenis usaha">
                    @error('usaha')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telepon -->
                <div>
                    <label for="telp" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                    <input type="text" name="telp" id="telp" value="{{ old('telp') }}" required maxlength="15"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Masukkan nomor telepon">
                    @error('telp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pendamping -->
                <div>
                    <label for="pendamping_id" class="block text-sm font-medium text-gray-700 mb-2">Pendamping</label>
                    <select name="pendamping_id" id="pendamping_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">-- Pilih Pendamping --</option>
                        @foreach($pendamping as $p)
                            <option value="{{ $p->id }}" {{ old('pendamping_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('pendamping_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Kolom Kanan - Upload Dokumen -->
            <div class="space-y-6">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Upload Dokumen</h3>
                    
                    <!-- Dokumen KTP -->
                    <div class="mb-4">
                        <label for="dokumen_ktp" class="block text-sm font-medium text-gray-700 mb-2">Dokumen KTP</label>
                        <input type="file" name="dokumen_ktp" id="dokumen_ktp"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG, PDF (Max 2MB)</p>
                        @error('dokumen_ktp')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dokumen KK -->
                    <div class="mb-4">
                        <label for="dokumen_kk" class="block text-sm font-medium text-gray-700 mb-2">Dokumen KK</label>
                        <input type="file" name="dokumen_kk" id="dokumen_kk"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG, PDF (Max 2MB)</p>
                        @error('dokumen_kk')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Usaha -->
                    <div class="mb-4">
                        <label for="dokumen_foto_usaha" class="block text-sm font-medium text-gray-700 mb-2">Foto Usaha</label>
                        <input type="file" name="dokumen_foto_usaha" id="dokumen_foto_usaha"
                            accept=".jpg,.jpeg,.png"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG (Max 2MB)</p>
                        @error('dokumen_foto_usaha')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- SKTM -->
                    <div class="mb-4">
                        <label for="dokumen_sktm" class="block text-sm font-medium text-gray-700 mb-2">SKTM</label>
                        <input type="file" name="dokumen_sktm" id="dokumen_sktm"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG, PDF (Max 2MB)</p>
                        @error('dokumen_sktm')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Proposal -->
                    <div>
                        <label for="dokumen_proposal" class="block text-sm font-medium text-gray-700 mb-2">Proposal</label>
                        <input type="file" name="dokumen_proposal" id="dokumen_proposal"
                            accept=".pdf,.doc,.docx"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="mt-1 text-xs text-gray-500">Format: PDF, DOC, DOCX (Max 5MB)</p>
                        @error('dokumen_proposal')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Status Verifikasi -->
                <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                    <h3 class="text-sm font-semibold text-yellow-800 mb-2">
                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Informasi
                    </h3>
                    <p class="text-sm text-yellow-700">Status verifikasi akan otomatis di-set sebagai "Tidak Valid". Admin akan memverifikasi data tersebut.</p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex items-center justify-end gap-4 border-t border-gray-200 pt-6">
            <a href="{{ route('admin.calonpenerima.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection