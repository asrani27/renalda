<?php

namespace Database\Seeders;

use App\Models\SerahTerima;
use App\Models\Penerima;
use App\Models\Pendamping;
use Illuminate\Database\Seeder;

class SerahTerimaSeeder extends Seeder
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
            $this->command->warn('No pendamping or penerima found. Skipping SerahTerima seeder.');
            return;
        }

        $serahTerimaData = [
            [
                'penerima_id' => $penerima->id,
                'pendamping_id' => $pendamping->id,
                'nomor_bast' => 'BAST/001/2026',
                'tanggal_bast' => '2026-01-15',
                'foto_bast' => null,
            ],
            [
                'penerima_id' => $penerima->id,
                'pendamping_id' => $pendamping->id,
                'nomor_bast' => 'BAST/002/2026',
                'tanggal_bast' => '2026-02-20',
                'foto_bast' => null,
            ],
            [
                'penerima_id' => $penerima->id,
                'pendamping_id' => $pendamping->id,
                'nomor_bast' => 'BAST/003/2026',
                'tanggal_bast' => '2026-03-10',
                'foto_bast' => null,
            ],
        ];

        foreach ($serahTerimaData as $data) {
            SerahTerima::create($data);
        }

        $this->command->info('Serah Terima data seeded successfully!');
    }
}