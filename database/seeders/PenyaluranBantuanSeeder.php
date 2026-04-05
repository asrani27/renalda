<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PenyaluranBantuan;
use App\Models\JadwalPenyaluran;
use App\Models\Penerima;

class PenyaluranBantuanSeeder extends Seeder
{
    /**
     * Run database seeds.
     */
    public function run(): void
    {
        // Get jadwal penyaluran
        $jadwalPenyalurans = JadwalPenyaluran::all();
        
        // Get penerima data
        $penerimas = Penerima::all();

        if ($jadwalPenyalurans->isEmpty() || $penerimas->isEmpty()) {
            $this->command->warn('Tidak ada data jadwal penyaluran atau penerima. Tidak dapat membuat data penyaluran bantuan.');
            return;
        }

        // Create sample penyaluran bantuan data
        $penyaluranBantuans = [
            [
                'tanggal' => '2026-01-15',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[0]->id ?? null,
                'penerima_id' => $penerimas[0]->id ?? null,
                'status' => 'salur',
            ],
            [
                'tanggal' => '2026-01-15',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[0]->id ?? null,
                'penerima_id' => $penerimas[1]->id ?? null,
                'status' => 'dalam proses',
            ],
            [
                'tanggal' => '2026-02-20',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[1]->id ?? null,
                'penerima_id' => $penerimas[2]->id ?? null,
                'status' => 'salur',
            ],
            [
                'tanggal' => '2026-02-20',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[1]->id ?? null,
                'penerima_id' => $penerimas[3]->id ?? null,
                'status' => 'dalam proses',
            ],
            [
                'tanggal' => '2026-03-10',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[2]->id ?? null,
                'penerima_id' => $penerimas[4]->id ?? null,
                'status' => 'salur',
            ],
            [
                'tanggal' => '2026-03-10',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[2]->id ?? null,
                'penerima_id' => $penerimas[0]->id ?? null,
                'status' => 'dalam proses',
            ],
            [
                'tanggal' => '2026-04-05',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[3]->id ?? null,
                'penerima_id' => $penerimas[1]->id ?? null,
                'status' => 'salur',
            ],
            [
                'tanggal' => '2026-04-05',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[3]->id ?? null,
                'penerima_id' => $penerimas[2]->id ?? null,
                'status' => 'dalam proses',
            ],
            [
                'tanggal' => '2026-12-15',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[4]->id ?? null,
                'penerima_id' => $penerimas[3]->id ?? null,
                'status' => 'salur',
            ],
            [
                'tanggal' => '2026-12-15',
                'jadwal_penyaluran_id' => $jadwalPenyalurans[4]->id ?? null,
                'penerima_id' => $penerimas[4]->id ?? null,
                'status' => 'dalam proses',
            ],
        ];

        // Filter out null values and insert
        $validPenyaluranBantuans = array_filter($penyaluranBantuans, function($item) {
            return $item['jadwal_penyaluran_id'] !== null && $item['penerima_id'] !== null;
        });

        foreach ($validPenyaluranBantuans as $penyaluranBantuan) {
            PenyaluranBantuan::create($penyaluranBantuan);
        }

        $this->command->info(count($validPenyaluranBantuans) . ' data penyaluran bantuan berhasil ditambahkan.');
    }
}