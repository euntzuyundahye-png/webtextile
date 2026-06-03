<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petugas Gudang',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Owner',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}