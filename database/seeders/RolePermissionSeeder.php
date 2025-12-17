<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view students',
            'create students',
            'edit students',
            'delete students',
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $editor = Role::firstOrCreate(['name' => 'Editor']);

        $admin->givePermissionTo(Permission::all());

        $editor->givePermissionTo([
            'view students',
            'create students',
            'edit students',
            'view courses',
            'create courses',
            'edit courses',
        ]);
    }
}
