<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $permissions = Permission::all();
        $superAdmin->syncPermissions($permissions);

        $iba = Role::create(['name' => 'User', 'guard_name' => 'web']);
        $permissions = (new PermissionSeeder())->getUserPermissions();
        $iba->syncPermissions($permissions);


    }
}
