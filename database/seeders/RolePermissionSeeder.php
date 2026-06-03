<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::where('name', 'Admin')->first();
        $gudang = Role::where('name', 'Petugas Gudang')->first();
        $owner = Role::where('name', 'Owner')->first();

        /*
        |--------------------------------------------------------------------------
        | Admin
        |--------------------------------------------------------------------------
        */

        $admin->permissions()->sync(
            Permission::pluck('id')->toArray()
        );

        /*
        |--------------------------------------------------------------------------
        | Petugas Gudang
        |--------------------------------------------------------------------------
        */

        $gudangPermissions = Permission::whereIn('name', [

            'kain.view',
            'kain.create',
            'kain.edit',

            'stok_masuk.view',
            'stok_masuk.create',
            'stok_masuk.edit',

            'stok_keluar.view',
            'stok_keluar.create',
            'stok_keluar.edit',

            'laporan.view',

        ])->pluck('id')->toArray();

        $gudang->permissions()->sync(
            $gudangPermissions
        );

        /*
        |--------------------------------------------------------------------------
        | Owner
        |--------------------------------------------------------------------------
        */

        $ownerPermissions = Permission::whereIn('name', [

            'kain.view',
            'stok_masuk.view',
            'stok_keluar.view',
            'laporan.view',

        ])->pluck('id')->toArray();

        $owner->permissions()->sync(
            $ownerPermissions
        );
    }
}