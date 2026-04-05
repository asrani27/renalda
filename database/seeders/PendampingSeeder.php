<?php

namespace Database\Seeders;

use App\Models\Pendamping;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PendampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendampingData = [
            [
                'nama' => 'Ahmad Fauzi',
                'telp' => '081234567890',
                'kecamatan' => 'Basarang',
                'jabatan' => 'Kepala Seksi',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Siti Aminah',
                'telp' => '081234567891',
                'kecamatan' => 'Bataguh',
                'jabatan' => 'Pendamping Lapangan',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Budi Santoso',
                'telp' => '081234567892',
                'kecamatan' => 'Dadahup',
                'jabatan' => 'Koordinator Wilayah',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Dewi Sartika',
                'telp' => '081234567893',
                'kecamatan' => 'Kapuas Barat',
                'jabatan' => 'Pendamping Lapangan',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Eko Prasetyo',
                'telp' => '081234567894',
                'kecamatan' => 'Kapuas Hilir',
                'jabatan' => 'Kepala Seksi',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Fitriani Rahayu',
                'telp' => '081234567895',
                'kecamatan' => 'Kapuas Hulu',
                'jabatan' => 'Pendamping Lapangan',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Gunawan Wijaya',
                'telp' => '081234567896',
                'kecamatan' => 'Kapuas Kuala',
                'jabatan' => 'Koordinator Wilayah',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Hartini Putri',
                'telp' => '081234567897',
                'kecamatan' => 'Kapuas Murung',
                'jabatan' => 'Pendamping Lapangan',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Indra Lesmana',
                'telp' => '081234567898',
                'kecamatan' => 'Kapuas Tengah',
                'jabatan' => 'Kepala Seksi',
                'unitkerja' => 'Dinas Sosial',
            ],
            [
                'nama' => 'Junita Sari',
                'telp' => '081234567899',
                'kecamatan' => 'Kapuas Timur',
                'jabatan' => 'Pendamping Lapangan',
                'unitkerja' => 'Dinas Sosial',
            ],
        ];

        foreach ($pendampingData as $index => $data) {
            // Create user account for each pendamping
            $user = User::create([
                'name' => $data['nama'],
                'username' => strtolower(str_replace(' ', '', $data['nama'])),
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]);

            // Create pendamping data
            Pendamping::create([
                'nama' => $data['nama'],
                'telp' => $data['telp'],
                'kecamatan' => $data['kecamatan'],
                'jabatan' => $data['jabatan'],
                'unitkerja' => $data['unitkerja'],
                'user_id' => $user->id,
            ]);
        }

        $this->command->info('Successfully seeded 10 pendamping data with user accounts.');
    }
}