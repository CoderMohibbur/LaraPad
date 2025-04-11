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
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $editor = Role::firstOrCreate(['name' => 'Editor']);

        $user = \App\Models\User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
        ]);

        $user->assignRole($admin);
    }

}
