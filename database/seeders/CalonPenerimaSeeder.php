<?php

namespace Database\Seeders;

use App\Models\CalonPenerima;
use App\Models\Pendamping;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalonPenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get first pendamping or create one if not exists
        $pendamping = Pendamping::first();

        $calonPenerimaData = [
            [
                'nik' => '7301010101010001',
                'nama' => 'Ahmad Yusuf',
                'alamat' => 'Jl. Poros No. 45, Kecamatan Mariso, Makassar',
                'usaha' => 'Warung Makan',
                'telp' => '081234567890',
                'pendamping_id' => $pendamping ? $pendamping->id : null,
                'dokumen_ktp' => null,
                'dokumen_kk' => null,
                'dokumen_foto_usaha' => null,
                'dokumen_sktm' => null,
                'dokumen_proposal' => null,
                'status_verif' => 'tidak valid',
                'tanggal_verif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '7302020202020002',
                'nama' => 'Siti Aminah',
                'alamat' => 'Jl. Sungai Saddang No. 12, Kecamatan Ujung Pandang, Makassar',
                'usaha' => 'Toko Kelontong',
                'telp' => '082345678901',
                'pendamping_id' => $pendamping ? $pendamping->id : null,
                'dokumen_ktp' => null,
                'dokumen_kk' => null,
                'dokumen_foto_usaha' => null,
                'dokumen_sktm' => null,
                'dokumen_proposal' => null,
                'status_verif' => 'tidak valid',
                'tanggal_verif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '7303030303030003',
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Perintis Kemerdekaan No. 78, Kecamatan Tamalanrea, Makassar',
                'usaha' => 'Bengkel Motor',
                'telp' => '083456789012',
                'pendamping_id' => $pendamping ? $pendamping->id : null,
                'dokumen_ktp' => null,
                'dokumen_kk' => null,
                'dokumen_foto_usaha' => null,
                'dokumen_sktm' => null,
                'dokumen_proposal' => null,
                'status_verif' => 'tidak valid',
                'tanggal_verif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '7304040404040004',
                'nama' => 'Dewi Sartika',
                'alamat' => 'Jl. AP. Pettarani No. 56, Kecamatan Rappocini, Makassar',
                'usaha' => 'Konveksi',
                'telp' => '084567890123',
                'pendamping_id' => $pendamping ? $pendamping->id : null,
                'dokumen_ktp' => null,
                'dokumen_kk' => null,
                'dokumen_foto_usaha' => null,
                'dokumen_sktm' => null,
                'dokumen_proposal' => null,
                'status_verif' => 'tidak valid',
                'tanggal_verif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '7305050505050005',
                'nama' => 'Rudi Hartono',
                'alamat' => 'Jl. Bau Massepe No. 23, Kecamatan Panakkukang, Makassar',
                'usaha' => 'Jasa Servis Elektronik',
                'telp' => '085678901234',
                'pendamping_id' => $pendamping ? $pendamping->id : null,
                'dokumen_ktp' => null,
                'dokumen_kk' => null,
                'dokumen_foto_usaha' => null,
                'dokumen_sktm' => null,
                'dokumen_proposal' => null,
                'status_verif' => 'tidak valid',
                'tanggal_verif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('calon_penerima')->insert($calonPenerimaData);
    }
}