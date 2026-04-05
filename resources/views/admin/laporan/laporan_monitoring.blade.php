@extends('layouts.app')

@section('title', 'Laporan Monitoring')

@section('page-title', 'Laporan Monitoring')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header with Back Button -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.laporan.index') }}"
                class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-800 transition-colors mb-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Laporan
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Laporan Monitoring</h2>
            <p class="text-gray-600">Tahun {{ $tahun }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.laporan.monitoring.pdf', ['tahun' => $tahun]) }}" target="_blank"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 text-white py-2.5 px-4 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 font-medium text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Download PDF
            </a>
        </div>
    </div>

    <!-- Summary Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Monitoring</p>
                <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalMonitoring }}</p>
                <p class="text-blue-600 text-sm mt-1">kunjungan monitoring</p>
            </div>
            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Tanggal Monitoring</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama Penerima</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Pendamping</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Kondisi Usaha</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Perkembangan Usaha</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($monitoring as $i => $item)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $i + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $item->tanggal_monitoring->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                            {{ $item->penerima && $item->penerima->calonPenerima ? $item->penerima->calonPenerima->nama : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->pendamping ? $item->pendamping->nama : '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $item->kondisi_usaha }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $item->perkembangan_usaha }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                <p class="text-gray-500 text-lg font-medium">Tidak ada data monitoring</p>
                                <p class="text-gray-400 text-sm mt-1">Silakan pilih tahun lain atau tambah data
                                    monitoring</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Info -->
        @if($monitoring->count() > 0)
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <p class="text-sm text-gray-600">
                Menampilkan <span class="font-semibold">{{ $monitoring->count() }}</span> data monitoring tahun {{
                $tahun }}
            </p>
        </div>
        @endif
    </div>

    <!-- Print Styles -->
    <style media="print">
        @page {
            size: landscape;
            margin: 10mm;
        }

        body {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .no-print {
            display: none !important;
        }

        .bg-gray-50 {
            background-color: #f9fafb !important;
        }

        .border-gray-200 {
            border-color: #e5e7eb !important;
        }

        .text-gray-600 {
            color: #4b5563 !important;
        }

        .text-gray-900 {
            color: #111827 !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #e5e7eb !important;
            padding: 8px;
        }

        th {
            background-color: #f9fafb !important;
            font-weight: 600;
        }
    </style>
</div>
@endsection