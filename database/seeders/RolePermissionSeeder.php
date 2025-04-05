<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'Editor']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@larapad.test'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole('Admin');
    }
}
