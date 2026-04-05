<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerima;
use App\Models\PenyaluranBantuan;
use App\Models\Bantuan;
use App\Models\Monitoring;

class LaporanController extends Controller
{
    /**
     * Display the laporan page
     */
    public function index()
    {
        $years = $this->getAvailableYears();
        $monitoringYears = $this->getAvailableMonitoringYears();
        return view('admin.laporan.index', compact('years', 'monitoringYears'));
    }

    /**
     * Generate Laporan Penerima Bantuan by year
     */
    public function laporanPenerimaBantuan(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100'
        ]);

        $tahun = $request->tahun;

        // Get all penerima with their related data
        $penerima = Penerima::with(['bantuan', 'penyaluranBantuan.jadwalPenyaluran', 'calonPenerima'])
            ->whereHas('penyaluranBantuan', function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            })
            ->get();

        $totalPenerima = $penerima->count();
        $totalBantuan = $penerima->sum(function ($item) {
            return $item->bantuan ? $item->bantuan->nilai : 0;
        });

        return view('admin.laporan.laporan_penerima', compact('penerima', 'tahun', 'totalPenerima', 'totalBantuan'));
    }

    /**
     * Export Laporan Penerima Bantuan to PDF
     */
    public function exportPdfPenerimaBantuan(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100'
        ]);

        $tahun = $request->tahun;

        // Get all penerima with their related data
        $penerima = Penerima::with(['bantuan', 'penyaluranBantuan.jadwalPenyaluran', 'calonPenerima'])
            ->whereHas('penyaluranBantuan', function ($query) use ($tahun) {
                $query->whereYear('tanggal', $tahun);
            })
            ->get();

        $totalPenerima = $penerima->count();
        $totalBantuan = $penerima->sum(function ($item) {
            return $item->bantuan ? $item->bantuan->nilai : 0;
        });

        $pdf = \PDF::loadView('admin.laporan.pdf.penerima', compact('penerima', 'tahun', 'totalPenerima', 'totalBantuan'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-penerima-bantuan-' . $tahun . '.pdf');
    }

    /**
     * Generate Laporan Monitoring by year
     */
    public function laporanMonitoring(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100'
        ]);

        $tahun = $request->tahun;

        // Get all monitoring data with their related data
        $monitoring = Monitoring::with(['penerima.calonPenerima', 'penerima.bantuan', 'pendamping'])
            ->whereYear('tanggal_monitoring', $tahun)
            ->orderBy('tanggal_monitoring', 'desc')
            ->get();

        $totalMonitoring = $monitoring->count();

        return view('admin.laporan.laporan_monitoring', compact('monitoring', 'tahun', 'totalMonitoring'));
    }

    /**
     * Export Laporan Monitoring to PDF
     */
    public function exportPdfMonitoring(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100'
        ]);

        $tahun = $request->tahun;

        // Get all monitoring data with their related data
        $monitoring = Monitoring::with(['penerima.calonPenerima', 'penerima.bantuan', 'pendamping'])
            ->whereYear('tanggal_monitoring', $tahun)
            ->orderBy('tanggal_monitoring', 'desc')
            ->get();

        $totalMonitoring = $monitoring->count();

        $pdf = \PDF::loadView('admin.laporan.pdf.monitoring', compact('monitoring', 'tahun', 'totalMonitoring'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-monitoring-' . $tahun . '.pdf');
    }

    /**
     * Get available years from penyaluran_bantuan
     */
    private function getAvailableYears()
    {
        $years = PenyaluranBantuan::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        if (empty($years)) {
            $currentYear = date('Y');
            return [$currentYear];
        }

        return $years;
    }

    /**
     * Get available years from monitoring
     */
    private function getAvailableMonitoringYears()
    {
        $years = Monitoring::selectRaw('YEAR(tanggal_monitoring) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        if (empty($years)) {
            $currentYear = date('Y');
            return [$currentYear];
        }

        return $years;
    }

    /**
     * Generate Surat Pernyataan PDF
     */
    public function generateSuratPernyataan(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima,id',
            'nomor' => 'required|string',
            'tanggal' => 'required|date',
            'tahun' => 'required|integer|min:2020|max:2100'
        ]);

        $penerima = Penerima::with('calonPenerima')->findOrFail($request->penerima_id);

        $data = [
            'nama' => $penerima->calonPenerima->nama ?? '',
            'nik' => $penerima->calonPenerima->nik ?? '',
            'alamat' => $penerima->calonPenerima->alamat ?? '',
            'nomor' => $request->nomor,
            'tanggal' => date('d F Y', strtotime($request->tanggal)),
            'tahun' => $request->tahun,
            'date' => date('d F Y')
        ];

        $pdf = \PDF::loadView('admin.laporan.pdf.surat_pernyataan', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->stream('surat-pernyataan-' . str_replace(' ', '-', $data['nama']) . '.pdf');
    }
}
