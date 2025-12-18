<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class EditorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);

        $editor = User::firstOrCreate(
            ['email' => 'editor@student.com'],
            [
                'name' => 'Editor User',
                'password' => Hash::make('password'),
            ]
        );

        if (!$editor->hasRole('Editor')) {
            $editor->assignRole($editorRole);
        }
    }
}
