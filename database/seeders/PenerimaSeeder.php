<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penerima;
use App\Models\CalonPenerima;
use App\Models\Bantuan;

class PenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get calon penerima with status 'valid'
        $calonPenerimas = CalonPenerima::where('status_verif', 'valid')->get();
        
        // Get all bantuan
        $bantuans = Bantuan::all();

        if ($calonPenerimas->isEmpty() || $bantuans->isEmpty()) {
            $this->command->warn('Tidak ada data calon penerima atau bantuan. Tidak dapat membuat data penerima.');
            return;
        }

        // Create sample penerima data
        $penerimas = [
            [
                'calon_penerima_id' => $calonPenerimas[0]->id ?? null,
                'bantuan_id' => $bantuans[0]->id ?? null,
                'status_penerima' => 'Disetujui',
                'tanggal_penyaluran' => '2026-01-15',
                'catatan' => 'Penyaluran bantuan telah dilakukan dengan lancar. Penerima sudah menerima dana bantuan.',
            ],
            [
                'calon_penerima_id' => $calonPenerimas[1]->id ?? null,
                'bantuan_id' => $bantuans[1]->id ?? null,
                'status_penerima' => 'Proses',
                'tanggal_penyaluran' => null,
                'catatan' => 'Sedang dalam proses verifikasi administrasi.',
            ],
            [
                'calon_penerima_id' => $calonPenerimas[2]->id ?? null,
                'bantuan_id' => $bantuans[2]->id ?? null,
                'status_penerima' => 'Disetujui',
                'tanggal_penyaluran' => '2026-02-20',
                'catatan' => 'Penyaluran bantuan periode pertama tahun 2026.',
            ],
            [
                'calon_penerima_id' => $calonPenerimas[3]->id ?? null,
                'bantuan_id' => $bantuans[3]->id ?? null,
                'status_penerima' => 'Ditolak',
                'tanggal_penyaluran' => null,
                'catatan' => 'Ditolak karena tidak memenuhi kriteria usaha yang ditentukan.',
            ],
            [
                'calon_penerima_id' => $calonPenerimas[4]->id ?? null,
                'bantuan_id' => $bantuans[4]->id ?? null,
                'status_penerima' => 'Proses',
                'tanggal_penyaluran' => null,
                'catatan' => 'Menunggu jadwal penyaluran bantuan.',
            ],
        ];

        // Filter out null values and insert
        $validPenerimas = array_filter($penerimas, function($item) {
            return $item['calon_penerima_id'] !== null && $item['bantuan_id'] !== null;
        });

        foreach ($validPenerimas as $penerima) {
            Penerima::create($penerima);
        }

        $this->command->info(count($validPenerimas) . ' data penerima berhasil ditambahkan.');
    }
}