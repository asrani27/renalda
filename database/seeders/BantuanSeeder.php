<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bantuan;

class BantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bantuanData = [
            [
                'nama' => 'Bantuan Sosial Tunai',
                'kategori' => 'Sosial',
                'tahun' => 2024,
                'nilai' => 500000000,
                'sumber' => 'APBD',
                'deskripsi' => 'Bantuan sosial tunai untuk masyarakat kurang mampu di wilayah kabupaten.',
            ],
            [
                'nama' => 'Program Bedah Rumah',
                'kategori' => 'Perumahan',
                'tahun' => 2024,
                'nilai' => 750000000,
                'sumber' => 'APBD',
                'deskripsi' => 'Program renovasi dan pembangunan rumah tidak layak huni bagi keluarga prasejahtera.',
            ],
            [
                'nama' => 'Bantuan Pendampingan UMKM',
                'kategori' => 'Ekonomi',
                'tahun' => 2025,
                'nilai' => 300000000,
                'sumber' => 'HIBAH',
                'deskripsi' => 'Bantuan hibah untuk pendampingan dan pengembangan usaha mikro kecil menengah.',
            ],
            [
                'nama' => 'Beasiswa Pendidikan',
                'kategori' => 'Pendidikan',
                'tahun' => 2024,
                'nilai' => 450000000,
                'sumber' => 'APBD',
                'deskripsi' => 'Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu.',
            ],
            [
                'nama' => 'Bantuan Kesehatan',
                'kategori' => 'Kesehatan',
                'tahun' => 2025,
                'nilai' => 600000000,
                'sumber' => 'HIBAH',
                'deskripsi' => 'Bantuan kesehatan untuk pemeriksaan dan pengobatan gratis bagi masyarakat.',
            ],
        ];

        foreach ($bantuanData as $data) {
            Bantuan::create($data);
        }

        $this->command->info('Successfully seeded 5 bantuan data.');
    }
}