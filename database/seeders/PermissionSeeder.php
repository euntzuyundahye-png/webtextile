<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

            // USER
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            // ROLE
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',

            // PERMISSION
            'permission.view',
            'permission.create',
            'permission.edit',
            'permission.delete',

            // KAIN
            'kain.view',
            'kain.create',
            'kain.edit',
            'kain.delete',

            // STOK MASUK
            'stok_masuk.view',
            'stok_masuk.create',
            'stok_masuk.edit',
            'stok_masuk.delete',

            // STOK KELUAR
            'stok_keluar.view',
            'stok_keluar.create',
            'stok_keluar.edit',
            'stok_keluar.delete',

            // LAPORAN
            'laporan.view',
        ];

        foreach ($permissions as $permission) {

            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }
    }
}