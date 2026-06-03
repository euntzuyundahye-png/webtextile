<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $gudangRole = Role::where('name', 'Petugas Gudang')->first();
        $ownerRole = Role::where('name', 'Owner')->first();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Petugas Gudang',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => $gudangRole->id,
        ]);

        User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => $ownerRole->id,
        ]);
    }
}