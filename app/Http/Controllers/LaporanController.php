<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerima;
use App\Models\PenyaluranBantuan;
use App\Models\Bantuan;
use App\Models\Monitoring;
use App\Models\Pendamping;

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
     * Generate Laporan Penerima Bantuan by year or date range
     */
    public function laporanPenerimaBantuan(Request $request)
    {
        $filterType = $request->filter_type ?? 'tahun';
        
        if ($filterType === 'periode') {
            $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai'
            ]);
            $tanggalMulai = $request->tanggal_mulai;
            $tanggalSelesai = $request->tanggal_selesai;
            
            $penerima = Penerima::with(['bantuan', 'penyaluranBantuan.jadwalPenyaluran', 'calonPenerima'])
                ->whereHas('penyaluranBantuan', function ($query) use ($tanggalMulai, $tanggalSelesai) {
                    $query->whereBetween('tanggal', [$tanggalMulai, $tanggalSelesai]);
                })
                ->get();
        } else {
            $request->validate([
                'tahun' => 'required|integer|min:2020|max:2100'
            ]);
            $tahun = $request->tahun;
            $tanggalMulai = $tahun . '-01-01';
            $tanggalSelesai = $tahun . '-12-31';
            
            $penerima = Penerima::with(['bantuan', 'penyaluranBantuan.jadwalPenyaluran', 'calonPenerima'])
                ->whereHas('penyaluranBantuan', function ($query) use ($tahun) {
                    $query->whereYear('tanggal', $tahun);
                })
                ->get();
        }

        $totalPenerima = $penerima->count();
        $totalBantuan = $penerima->sum(function ($item) {
            return $item->bantuan ? $item->bantuan->nilai : 0;
        });

        return view('admin.laporan.laporan_penerima', compact('penerima', 'tanggalMulai', 'tanggalSelesai', 'totalPenerima', 'totalBantuan'));
    }

    /**
     * Export Laporan Penerima Bantuan to PDF
     */
    public function exportPdfPenerimaBantuan(Request $request)
    {
        // Support both year and date range parameters
        if ($request->has('tanggal_mulai') && $request->has('tanggal_selesai')) {
            $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai'
            ]);
            $tanggalMulai = $request->tanggal_mulai;
            $tanggalSelesai = $request->tanggal_selesai;
            
            $penerima = Penerima::with(['bantuan', 'penyaluranBantuan.jadwalPenyaluran', 'calonPenerima'])
                ->whereHas('penyaluranBantuan', function ($query) use ($tanggalMulai, $tanggalSelesai) {
                    $query->whereBetween('tanggal', [$tanggalMulai, $tanggalSelesai]);
                })
                ->get();
        } else {
            $request->validate([
                'tahun' => 'required|integer|min:2020|max:2100'
            ]);
            $tahun = $request->tahun;
            $tanggalMulai = $tahun . '-01-01';
            $tanggalSelesai = $tahun . '-12-31';
            
            $penerima = Penerima::with(['bantuan', 'penyaluranBantuan.jadwalPenyaluran', 'calonPenerima'])
                ->whereHas('penyaluranBantuan', function ($query) use ($tahun) {
                    $query->whereYear('tanggal', $tahun);
                })
                ->get();
        }

        $totalPenerima = $penerima->count();
        $totalBantuan = $penerima->sum(function ($item) {
            return $item->bantuan ? $item->bantuan->nilai : 0;
        });

        $pdf = \PDF::loadView('admin.laporan.pdf.penerima', compact('penerima', 'tanggalMulai', 'tanggalSelesai', 'totalPenerima', 'totalBantuan'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-penerima-bantuan-' . date('Ymd', strtotime($tanggalMulai)) . '-' . date('Ymd', strtotime($tanggalSelesai)) . '.pdf');
    }

    /**
     * Generate Laporan Monitoring by year or date range
     */
    public function laporanMonitoring(Request $request)
    {
        $filterType = $request->filter_type_monitoring ?? 'tahun';
        
        if ($filterType === 'periode') {
            $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai'
            ]);
            $tanggalMulai = $request->tanggal_mulai;
            $tanggalSelesai = $request->tanggal_selesai;
            
            $monitoring = Monitoring::with(['penerima.calonPenerima', 'penerima.bantuan', 'pendamping'])
                ->whereBetween('tanggal_monitoring', [$tanggalMulai, $tanggalSelesai])
                ->orderBy('tanggal_monitoring', 'desc')
                ->get();
        } else {
            $request->validate([
                'tahun' => 'required|integer|min:2020|max:2100'
            ]);
            $tahun = $request->tahun;
            $tanggalMulai = $tahun . '-01-01';
            $tanggalSelesai = $tahun . '-12-31';
            
            $monitoring = Monitoring::with(['penerima.calonPenerima', 'penerima.bantuan', 'pendamping'])
                ->whereYear('tanggal_monitoring', $tahun)
                ->orderBy('tanggal_monitoring', 'desc')
                ->get();
        }

        $totalMonitoring = $monitoring->count();

        return view('admin.laporan.laporan_monitoring', compact('monitoring', 'tanggalMulai', 'tanggalSelesai', 'totalMonitoring'));
    }

    /**
     * Export Laporan Monitoring to PDF
     */
    public function exportPdfMonitoring(Request $request)
    {
        // Support both year and date range parameters
        if ($request->has('tanggal_mulai') && $request->has('tanggal_selesai')) {
            $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai'
            ]);
            $tanggalMulai = $request->tanggal_mulai;
            $tanggalSelesai = $request->tanggal_selesai;
            
            $monitoring = Monitoring::with(['penerima.calonPenerima', 'penerima.bantuan', 'pendamping'])
                ->whereBetween('tanggal_monitoring', [$tanggalMulai, $tanggalSelesai])
                ->orderBy('tanggal_monitoring', 'desc')
                ->get();
        } else {
            $request->validate([
                'tahun' => 'required|integer|min:2020|max:2100'
            ]);
            $tahun = $request->tahun;
            $tanggalMulai = $tahun . '-01-01';
            $tanggalSelesai = $tahun . '-12-31';
            
            $monitoring = Monitoring::with(['penerima.calonPenerima', 'penerima.bantuan', 'pendamping'])
                ->whereYear('tanggal_monitoring', $tahun)
                ->orderBy('tanggal_monitoring', 'desc')
                ->get();
        }

        $totalMonitoring = $monitoring->count();

        $pdf = \PDF::loadView('admin.laporan.pdf.monitoring', compact('monitoring', 'tanggalMulai', 'tanggalSelesai', 'totalMonitoring'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-monitoring-' . date('Ymd', strtotime($tanggalMulai)) . '-' . date('Ymd', strtotime($tanggalSelesai)) . '.pdf');
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

    /**
     * Generate Laporan Data Pendamping
     */
    public function laporanPendamping(Request $request)
    {
        $search = $request->input('search');
        
        $pendamping = Pendamping::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('telp', 'like', '%' . $search . '%')
                      ->orWhere('kecamatan', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('nama', 'asc')
            ->paginate(20);

        $totalPendamping = Pendamping::count();
        $pendampingDenganAkun = Pendamping::whereHas('user')->count();

        return view('admin.laporan.laporan_pendamping', compact('pendamping', 'totalPendamping', 'pendampingDenganAkun', 'search'));
    }

    /**
     * Export Laporan Data Pendamping to PDF
     */
    public function exportPdfPendamping(Request $request)
    {
        $search = $request->input('search');
        
        $pendamping = Pendamping::with('user')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('telp', 'like', '%' . $search . '%')
                      ->orWhere('kecamatan', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('nama', 'asc')
            ->get();

        $totalPendamping = $pendamping->count();
        $pendampingDenganAkun = $pendamping->filter(function ($item) {
            return $item->user != null;
        })->count();

        $pdf = \PDF::loadView('admin.laporan.pdf.pendamping', compact('pendamping', 'totalPendamping', 'pendampingDenganAkun', 'search'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-data-pendamping-' . date('Ymd') . '.pdf');
    }
}
