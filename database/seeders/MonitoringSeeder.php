<?php

namespace Database\Seeders;

use App\Models\Monitoring;
use App\Models\Penerima;
use App\Models\Pendamping;
use Illuminate\Database\Seeder;

class MonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get sample data
        $pendamping = Pendamping::first();
        $penerima = Penerima::first();

        if (!$pendamping || !$penerima) {
            $this->command->warn('No pendamping or penerima found. Skipping Monitoring seeder.');
            return;
        }

        $monitoringData = [
            [
                'penerima_id' => $penerima->id,
                'pendamping_id' => $pendamping->id,
                'tanggal_monitoring' => '2026-01-20',
                'kondisi_usaha' => 'Usaha warung berkembang dengan baik, penjualan meningkat sejak menerima bantuan. Stok barang terjaga dengan baik.',
                'perkembangan_usaha' => 'baik',
                'foto_monitoring' => null,
            ],
            [
                'penerima_id' => $penerima->id,
                'pendamping_id' => $pendamping->id,
                'tanggal_monitoring' => '2026-02-25',
                'kondisi_usaha' => 'Usaha berjalan stabil, perlu peningkatan dalam manajemen keuangan dan pencatatan.',
                'perkembangan_usaha' => 'cukup',
                'foto_monitoring' => null,
            ],
            [
                'penerima_id' => $penerima->id,
                'pendamping_id' => $pendamping->id,
                'tanggal_monitoring' => '2026-03-15',
                'kondisi_usaha' => 'Usaha mengalami penurunan penjualan akibat cuaca buruk, perlu strategi pemasaran baru.',
                'perkembangan_usaha' => 'kurang',
                'foto_monitoring' => null,
            ],
        ];

        foreach ($monitoringData as $data) {
            Monitoring::create($data);
        }

        $this->command->info('Monitoring data seeded successfully!');
    }
}