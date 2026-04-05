<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'role' => 'admin',
            'password' => 'superadmin',
        ]);

        User::create([
            'name' => 'Pendamping',
            'username' => 'pendamping',
            'role' => 'user',
            'password' => 'pendamping',
        ]);
    }
}