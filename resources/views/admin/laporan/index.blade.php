@extends('layouts.app')

@section('title', 'Laporan')

@section('page-title', 'Laporan')

@section('content')
<div class="container mx-auto px-4">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Laporan</h2>
        <p class="text-gray-600">Pilih laporan yang ingin Anda lihat</p>
    </div>

    <!-- Report Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Laporan Penerima Bantuan Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="bg-emerald-100 text-emerald-800 text-xs font-medium px-2.5 py-0.5 rounded">Populer</span>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Penerima Bantuan</h3>
                <p class="text-gray-600 text-sm mb-4">Laporan lengkap penerima bantuan beserta detail penyaluran</p>

                <form action="{{ route('admin.laporan.penerima-bantuan') }}" method="GET" class="space-y-3">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Berdasarkan</label>
                        <div class="flex gap-2">
                            <label class="flex items-center">
                                <input type="radio" name="filter_type" value="tahun" checked class="mr-2"> Pertahun
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="filter_type" value="periode" class="mr-2"> Periode
                            </label>
                        </div>
                    </div>
                    <div id="filter_tahun">
                        <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">Pilih Tahun</label>
                        <select name="tahun" id="tahun"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm">
                            @foreach($years as $year)
                            <option value="{{ $year }}" {{ $year==date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="filter_periode" class="hidden">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                    Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ date('Y-01-01') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm">
                            </div>
                            <div>
                                <label for="tanggal_selesai"
                                    class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                    value="{{ date('Y-12-31') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm">
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white py-2.5 px-4 rounded-lg hover:from-emerald-600 hover:to-emerald-700 transition-all duration-200 font-medium text-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Lihat Laporan
                    </button>
                </form>
                <script>
                    document.querySelectorAll('input[name="filter_type"]').forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            document.getElementById('filter_tahun').classList.toggle('hidden', this.value !== 'tahun');
                            document.getElementById('filter_periode').classList.toggle('hidden', this.value !== 'periode');
                        });
                    });
                </script>
            </div>
        </div>

        <!-- Surat Pernyataan Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">Dokumen</span>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Download Surat Pernyataan</h3>
                <p class="text-gray-600 text-sm mb-4">Surat pernyataan tanggung jawab mutlak penerima bantuan</p>

                <button onclick="document.getElementById('modalSuratPernyataan').classList.remove('hidden')"
                    class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white py-2.5 px-4 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-200 font-medium text-sm flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Generate Surat
                </button>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Baru</span>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Monitoring</h3>
                <p class="text-gray-600 text-sm mb-4">Laporan monitoring dan perkembangan usaha penerima</p>

                <form action="{{ route('admin.laporan.monitoring') }}" method="GET" class="space-y-3">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Berdasarkan</label>
                        <div class="flex gap-2">
                            <label class="flex items-center">
                                <input type="radio" name="filter_type_monitoring" value="tahun" checked class="mr-2">
                                Pertahun
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="filter_type_monitoring" value="periode" class="mr-2"> Periode
                            </label>
                        </div>
                    </div>
                    <div id="filter_tahun_monitoring">
                        <label for="tahun_monitoring" class="block text-sm font-medium text-gray-700 mb-1">Pilih
                            Tahun</label>
                        <select name="tahun" id="tahun_monitoring"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            @foreach($monitoringYears as $year)
                            <option value="{{ $year }}" {{ $year==date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="filter_periode_monitoring" class="hidden">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="tanggal_mulai_monitoring"
                                    class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai_monitoring"
                                    value="{{ date('Y-01-01') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                            <div>
                                <label for="tanggal_selesai_monitoring"
                                    class="block text-sm font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai_monitoring"
                                    value="{{ date('Y-12-31') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2.5 px-4 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 font-medium text-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Lihat Laporan
                    </button>
                </form>
                <script>
                    document.querySelectorAll('input[name="filter_type_monitoring"]').forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            document.getElementById('filter_tahun_monitoring').classList.toggle('hidden', this.value !== 'tahun');
                            document.getElementById('filter_periode_monitoring').classList.toggle('hidden', this.value !== 'periode');
                        });
                    });
                </script>
            </div>
        </div>

        <!-- Laporan Data Pendamping Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="bg-teal-100 text-teal-800 text-xs font-medium px-2.5 py-0.5 rounded">Data</span>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Data Pendamping</h3>
                <p class="text-gray-600 text-sm mb-4">Laporan lengkap data pendamping beserta detail akun</p>

                <form action="{{ route('admin.laporan.pendamping') }}" method="GET" class="space-y-3">
                    {{-- <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                        <input type="text" name="search" placeholder="Nama, telepon, atau kecamatan..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm">
                    </div> --}}
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white py-2.5 px-4 rounded-lg hover:from-teal-600 hover:to-teal-700 transition-all duration-200 font-medium text-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Lihat Laporan
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Modal Surat Pernyataan -->
<div id="modalSuratPernyataan"
    class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-lg w-full mx-4 transform transition-all">
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-6 py-4 rounded-t-lg">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-white">Generate Surat Pernyataan</h3>
                <button onclick="document.getElementById('modalSuratPernyataan').classList.add('hidden')"
                    class="text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.laporan.surat-pernyataan') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="penerima_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Penerima</label>
                    <select name="penerima_id" id="penerima_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <option value="">-- Pilih Penerima --</option>
                        @foreach(\App\Models\Penerima::with('calonPenerima')->get() as $penerima)
                        <option value="{{ $penerima->id }}">{{ $penerima->calonPenerima->nama ?? 'N/A' }} - {{
                            $penerima->calonPenerima->nik ?? 'N/A' }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="nomor" class="block text-sm font-medium text-gray-700 mb-1">Nomor Peraturan</label>
                    <input type="text" name="nomor" id="nomor" required placeholder="Contoh: 123/Disos/2026"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Peraturan</label>
                    <input type="date" name="tanggal" id="tanggal" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">Tahun Anggaran</label>
                    <input type="number" name="tahun" id="tahun" required placeholder="Contoh: 2026"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button"
                        onclick="document.getElementById('modalSuratPernyataan').classList.add('hidden')"
                        class="flex-1 bg-gray-200 text-gray-800 py-2.5 px-4 rounded-lg hover:bg-gray-300 transition-all duration-200 font-medium text-sm">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 bg-gradient-to-r from-purple-500 to-purple-600 text-white py-2.5 px-4 rounded-lg hover:from-purple-600 hover:to-purple-700 transition-all duration-200 font-medium text-sm">
                        Generate PDF
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection