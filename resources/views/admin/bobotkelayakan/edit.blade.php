@extends('layouts.app')

@section('title', 'Edit Bobot Kelayakan')

@section('page-title', 'Edit Bobot Kelayakan')

@section('content')
<div class="space-y-6">
    <!-- Info Card -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900">{{ $penerima->calonPenerima->nama }}</h3>
                <p class="text-sm text-gray-500">NIK: {{ $penerima->calonPenerima->nik }}</p>
                <p class="text-sm text-gray-500">Bantuan: {{ $penerima->bantuan->nama }}</p>
            </div>
        </div>
    </div>

    <!-- Kriteria Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Penilaian Kriteria</h3>
            <p class="text-sm text-gray-500 mt-1">Berikan skor 1-5 untuk setiap kriteria</p>
        </div>
        
        <form action="{{ route('admin.bobotkelayakan.update', $penerima->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kriteria</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Bobot (%)</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Skor (1-5)</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @php
                            $existingNilai = $penerima->nilaiKriteria->keyBy('kriteria_id');
                        @endphp
                        @forelse($kriterias as $kriteria)
                            @php
                                $nilaiKriteria = $existingNilai->get($kriteria->id);
                                $skor = $nilaiKriteria ? $nilaiKriteria->skor : old('skor.' . $kriteria->id, 1);
                                $nilai = $kriteria->bobot * $skor;
                            @endphp
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $kriteria->nama }}</div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-sm font-medium text-emerald-700">{{ number_format($kriteria->bobot, 2) }}%</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <select name="skor[{{ $kriteria->id }}]" 
                                            class="w-24 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none text-center"
                                            onchange="updateNilai(this, {{ $kriteria->bobot }})">
                                        @for($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" {{ $skor == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span id="nilai-{{ $kriteria->id }}" class="text-sm font-bold text-emerald-700">{{ number_format($nilai, 2) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        <p class="text-gray-500 text-lg">Tidak ada data kriteria</p>
                                        <p class="text-gray-400 text-sm mt-1">Silakan tambahkan data kriteria terlebih dahulu</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    @if($kriterias->count() > 0)
                    <tfoot class="bg-gray-50 border-t border-gray-200">
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-right">
                                <span class="text-sm font-semibold text-gray-900">Total Nilai:</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span id="totalNilai" class="text-lg font-bold text-emerald-700">
                                    @php
                                        $total = 0;
                                        foreach($kriterias as $kriteria) {
                                            $skor = old('skor.' . $kriteria->id, $existingNilai->get($kriteria->id)?->skor ?? 1);
                                            $total += $kriteria->bobot * $skor;
                                        }
                                        echo number_format($total, 2);
                                    @endphp
                                </span>
                            </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
            
            @if($kriterias->count() > 0)
            <div class="p-6 border-t border-gray-200 flex gap-4">
                <a href="{{ route('admin.bobotkelayakan.index') }}" 
                   class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-center">
                    Batal
                </a>
                <button type="submit" 
                        class="flex-1 px-4 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200 shadow-lg hover:shadow-xl">
                    Simpan
                </button>
            </div>
            @endif
        </form>
    </div>
</div>

<script>
    function updateNilai(select, bobot) {
        const skor = parseInt(select.value);
        const nilai = bobot * skor;
        const row = select.closest('tr');
        const nilaiSpan = row.querySelector('span[id^="nilai-"]');
        nilaiSpan.textContent = nilai.toFixed(2);
        
        updateTotalNilai();
    }
    
    function updateTotalNilai() {
        let total = 0;
        document.querySelectorAll('select[name^="skor["]').forEach(function(select) {
            const bobot = parseFloat(select.closest('tr').querySelector('span[id^="nilai-"]').textContent) / parseInt(select.value);
            total += bobot * parseInt(select.value);
        });
        document.getElementById('totalNilai').textContent = total.toFixed(2);
    }
    
    // Initial calculation
    document.addEventListener('DOMContentLoaded', function() {
        updateTotalNilai();
    });
</script>
@endsection