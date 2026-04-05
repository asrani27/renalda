<?php

namespace Database\Seeders;

use App\Models\JadwalPenyaluran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalPenyaluranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwalPenyaluran = [
            [
                'nama' => 'Penyaluran Bantuan Sosial Tahap 1',
                'tanggal' => '2026-01-15',
                'lokasi' => 'Kecamatan Ujung Pandang, Balai Desa',
                'pendamping_id' => 1,
            ],
            [
                'nama' => 'Penyaluran Bantuan Sosial Tahap 2',
                'tanggal' => '2026-02-20',
                'lokasi' => 'Kecamatan Rappocini, Aula Kantor Camat',
                'pendamping_id' => 2,
            ],
            [
                'nama' => 'Penyaluran Bantuan Pangan Non Tunai',
                'tanggal' => '2026-03-10',
                'lokasi' => 'Kecamatan Makassar, Gedung Serbaguna',
                'pendamping_id' => 3,
            ],
            [
                'nama' => 'Penyaluran Bantuan Sosial Tahap 3',
                'tanggal' => '2026-04-05',
                'lokasi' => 'Kecamatan Panakkukang, Puskesmas Pembantu',
                'pendamping_id' => 4,
            ],
            [
                'nama' => 'Penyaluran Bantuan Sosial Akhir Tahun',
                'tanggal' => '2026-12-15',
                'lokasi' => 'Kecamatan Tamalanrea, Kantor Kelurahan',
                'pendamping_id' => 5,
            ],
        ];

        foreach ($jadwalPenyaluran as $data) {
            JadwalPenyaluran::create($data);
        }

        $this->command->info('Successfully seeded ' . count($jadwalPenyaluran) . ' jadwal penyaluran data.');
    }
}
