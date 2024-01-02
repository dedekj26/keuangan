<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'kelola_pengguna',
            'kelola_keuangan',
            'kelola_kategori',
        ];

        foreach($permissions as $data) {
            Permission::create([
                'name' => $data
            ]);
        }

        $admin = Role::create([
            'name' => 'Admin',
        ]);

        $admin->syncPermissions([
            'kelola_pengguna',
            'kelola_keuangan',
            'kelola_kategori',
        ]);

        $operator = Role::create([
            'name' => 'Operator'
        ]);

        $operator->syncPermissions([
            'kelola_keuangan'
        ]);
    }
}
