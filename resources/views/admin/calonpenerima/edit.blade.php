@extends('layouts.app')

@section('title', 'Edit Calon Penerima Bantuan')

@section('page-title', 'Edit Calon Penerima Bantuan')

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
    <form action="{{ route('admin.calonpenerima.update', $calonpenerima->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div class="space-y-6">
                <!-- NIK -->
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">NIK <span class="text-red-500">*</span></label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik', $calonpenerima->nik) }}" required maxlength="16"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Masukkan 16 digit NIK">
                    @error('nik')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $calonpenerima->nama) }}" required
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
                        placeholder="Masukkan alamat lengkap">{{ old('alamat', $calonpenerima->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Usaha -->
                <div>
                    <label for="usaha" class="block text-sm font-medium text-gray-700 mb-2">Jenis Usaha <span class="text-red-500">*</span></label>
                    <input type="text" name="usaha" id="usaha" value="{{ old('usaha', $calonpenerima->usaha) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        placeholder="Masukkan jenis usaha">
                    @error('usaha')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telepon -->
                <div>
                    <label for="telp" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                    <input type="text" name="telp" id="telp" value="{{ old('telp', $calonpenerima->telp) }}" required maxlength="15"
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
                            <option value="{{ $p->id }}" {{ old('pendamping_id', $calonpenerima->pendamping_id) == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('pendamping_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Verifikasi -->
                <div>
                    <label for="status_verif" class="block text-sm font-medium text-gray-700 mb-2">Status Verifikasi <span class="text-red-500">*</span></label>
                    <select name="status_verif" id="status_verif" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="tidak valid" {{ old('status_verif', $calonpenerima->status_verif) === 'tidak valid' ? 'selected' : '' }}>Tidak Valid</option>
                        <option value="valid" {{ old('status_verif', $calonpenerima->status_verif) === 'valid' ? 'selected' : '' }}>Valid</option>
                    </select>
                    @error('status_verif')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Verifikasi -->
                @if($calonpenerima->tanggal_verif)
                <div>
                    <label for="tanggal_verif" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Verifikasi</label>
                    <input type="date" name="tanggal_verif" id="tanggal_verif" value="{{ old('tanggal_verif', $calonpenerima->tanggal_verif->format('Y-m-d')) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    @error('tanggal_verif')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                @endif
            </div>

            <!-- Kolom Kanan - Upload Dokumen -->
            <div class="space-y-6">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Dokumen</h3>
                    
                    <!-- Dokumen KTP -->
                    <div class="mb-4">
                        <label for="dokumen_ktp" class="block text-sm font-medium text-gray-700 mb-2">Dokumen KTP</label>
                        <input type="file" name="dokumen_ktp" id="dokumen_ktp"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, JPEG, PNG, PDF (Max 2MB)</p>
                        @if($calonpenerima->dokumen_ktp)
                            <div class="mt-2">
                                <p class="text-xs text-gray-600">File saat ini:</p>
                                <a href="{{ asset('storage/' . $calonpenerima->dokumen_ktp) }}" target="_blank" class="text-sm text-emerald-600 hover:underline">
                                    <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat dokumen
                                </a>
                            </div>
                        @endif
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
                        @if($calonpenerima->dokumen_kk)
                            <div class="mt-2">
                                <p class="text-xs text-gray-600">File saat ini:</p>
                                <a href="{{ asset('storage/' . $calonpenerima->dokumen_kk) }}" target="_blank" class="text-sm text-emerald-600 hover:underline">
                                    <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat dokumen
                                </a>
                            </div>
                        @endif
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
                        @if($calonpenerima->dokumen_foto_usaha)
                            <div class="mt-2">
                                <p class="text-xs text-gray-600">File saat ini:</p>
                                <a href="{{ asset('storage/' . $calonpenerima->dokumen_foto_usaha) }}" target="_blank" class="text-sm text-emerald-600 hover:underline">
                                    <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat foto
                                </a>
                            </div>
                        @endif
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
                        @if($calonpenerima->dokumen_sktm)
                            <div class="mt-2">
                                <p class="text-xs text-gray-600">File saat ini:</p>
                                <a href="{{ asset('storage/' . $calonpenerima->dokumen_sktm) }}" target="_blank" class="text-sm text-emerald-600 hover:underline">
                                    <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat dokumen
                                </a>
                            </div>
                        @endif
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
                        @if($calonpenerima->dokumen_proposal)
                            <div class="mt-2">
                                <p class="text-xs text-gray-600">File saat ini:</p>
                                <a href="{{ asset('storage/' . $calonpenerima->dokumen_proposal) }}" target="_blank" class="text-sm text-emerald-600 hover:underline">
                                    <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat proposal
                                </a>
                            </div>
                        @endif
                        @error('dokumen_proposal')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex items-center justify-end gap-4 border-t border-gray-200 pt-6">
            <a href="{{ route('admin.calonpenerima.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                Update Data
            </button>
        </div>
    </form>
</div>
@endsection