<?php

namespace App\Http\Controllers;

use App\Models\Pendamping;
use App\Models\Bantuan;
use App\Models\CalonPenerima;
use App\Models\Penerima;
use App\Models\JadwalPenyaluran;
use App\Models\PenyaluranBantuan;
use App\Models\Monitoring;
use App\Models\SerahTerima;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        // Get counts for all modules
        $totalPendamping = Pendamping::count();
        $totalBantuan = Bantuan::count();
        $totalCalonPenerima = CalonPenerima::count();
        $totalPenerima = Penerima::count();
        $totalJadwalPenyaluran = JadwalPenyaluran::count();
        $totalPenyaluranBantuan = PenyaluranBantuan::count();
        $totalMonitoring = Monitoring::count();
        $totalSerahTerima = SerahTerima::count();

        // Get recent activities (last 5)
        $recentPenyaluran = PenyaluranBantuan::with(['jadwalPenyaluran', 'penerima.calonPenerima'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $recentMonitoring = Monitoring::with(['penerima.calonPenerima'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // Get upcoming schedules (next 3)
        $upcomingJadwal = JadwalPenyaluran::where('tanggal', '>=', now())
            ->orderBy('tanggal', 'asc')
            ->limit(3)
            ->get();

        return view('admin.dashboard', compact(
            'totalPendamping',
            'totalBantuan',
            'totalCalonPenerima',
            'totalPenerima',
            'totalJadwalPenyaluran',
            'totalPenyaluranBantuan',
            'totalMonitoring',
            'totalSerahTerima',
            'recentPenyaluran',
            'recentMonitoring',
            'upcomingJadwal'
        ));
    }
}