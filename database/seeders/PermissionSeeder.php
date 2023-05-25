<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // User Management
            ['title' => 'user_management_access'],
            ['title' => 'user_access'],
            ['title' => 'user_create'],
            ['title' => 'user_update'],
            ['title' => 'user_delete'],
            ['title' => 'user_edit'],
            ['title' => 'user_show'],

            //Manajemen Kontrakan
            ['title' => 'rent_access'],
            ['title' => 'rent_create'],
            ['title' => 'rent_update'],
            ['title' => 'rent_delete'],
            ['title' => 'rent_edit'],
            ['title' => 'rent_show'],

            //Manajemen Penghuni
            ['title' => 'occupant_access'],
            ['title' => 'occupant_create'],
            ['title' => 'occupant_update'],
            ['title' => 'occupant_delete'],
            ['title' => 'occupant_edit'],
            ['title' => 'occupant_show'],

            //Manajemen Transaksi
            ['title' => 'transaction_access'],
            ['title' => 'transaction_create'],
            ['title' => 'transaction_update'],
            ['title' => 'transaction_delete'],
            ['title' => 'transaction_edit'],
            ['title' => 'transaction_show'],

            // Level Management
            ['title' => 'role_access'],
            ['title' => 'role_create'],
            ['title' => 'role_update'],
            ['title' => 'role_delete'],
            ['title' => 'role_edit'],

            // Permission Management
            ['title' => 'permission_access'],
            ['title' => 'permission_create'],
            ['title' => 'permission_update'],
            ['title' => 'permission_delete'],
            ['title' => 'permission_edit'],

            // Level Permission Management
            ['title' => 'permission_role_access'],
            ['title' => 'permission_role_create'],
            ['title' => 'permission_role_update'],
            ['title' => 'permission_role_delete'],
            ['title' => 'permission_role_edit'],

            // Activity Log Management
            ['title' => 'activity_log_access'],

            // Report Management
            ['title' => 'report_create'],
        ];

        Permission::insert($permissions);
    }
}
