@extends('layouts.app')

@section('title', 'Edit Penyaluran Bantuan')

@section('page-title', 'Edit Penyaluran Bantuan')

@section('content')
<div class="mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.penyaluranbantuan.update', $penyaluranbantuan->id) }}" method="POST">
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

            <!-- Data Penyaluran Section -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">
                    Data Penyaluran Bantuan
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">
                            Tanggal <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal" name="tanggal" 
                            value="{{ old('tanggal', $penyaluranbantuan->tanggal->format('Y-m-d')) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status" name="status" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                            <option value="">-- Pilih Status --</option>
                            <option value="dalam proses" {{ old('status', $penyaluranbantuan->status) === 'dalam proses' ? 'selected' : '' }}>
                                Dalam Proses
                            </option>
                            <option value="salur" {{ old('status', $penyaluranbantuan->status) === 'salur' ? 'selected' : '' }}>
                                Salur
                            </option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="jadwal_penyaluran_id" class="block text-sm font-medium text-gray-700 mb-1">
                            Jadwal Penyaluran <span class="text-red-500">*</span>
                        </label>
                        <select id="jadwal_penyaluran_id" name="jadwal_penyaluran_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                            <option value="">-- Pilih Jadwal Penyaluran --</option>
                            @foreach($jadwalPenyaluran as $jadwal)
                                <option value="{{ $jadwal->id }}" {{ old('jadwal_penyaluran_id', $penyaluranbantuan->jadwal_penyaluran_id) == $jadwal->id ? 'selected' : '' }}>
                                    {{ $jadwal->nama }} - {{ $jadwal->lokasi }} ({{ $jadwal->tanggal->format('d F Y') }})
                                </option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Pilih jadwal penyaluran yang sesuai</p>
                    </div>

                    <div class="md:col-span-2">
                        <label for="penerima_id" class="block text-sm font-medium text-gray-700 mb-1">
                            Penerima Bantuan <span class="text-red-500">*</span>
                        </label>
                        <select id="penerima_id" name="penerima_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                            <option value="">-- Pilih Penerima Bantuan --</option>
                            @foreach($penerima as $p)
                                @if($p->calonPenerima)
                                    <option value="{{ $p->id }}" {{ old('penerima_id', $penyaluranbantuan->penerima_id) == $p->id ? 'selected' : '' }}>
                                        {{ $p->calonPenerima->nama }}
                                        @if($p->bantuan)
                                            - {{ $p->bantuan->nama }}
                                        @endif
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Pilih penerima bantuan yang akan menerima</p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <a href="{{ route('admin.penyaluranbantuan.index') }}"
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