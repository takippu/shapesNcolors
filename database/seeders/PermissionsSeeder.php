<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Create permission
        Permission::create(['name' => 'manage']);
        //create role and give permission
        $role1 = Role::create(['name' => 'Admin']);
        $role1->givePermissionTo('manage');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role1);

        //
    }
}
