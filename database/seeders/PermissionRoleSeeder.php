<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($adminPermissions->pluck('id'));
        $staffPermission = $adminPermissions->filter(function($permission){
            return !str_starts_with($permission->title, 'user_') &&
                !str_starts_with($permission->title, 'rent_') &&
                !str_starts_with($permission->title, 'occupant_') &&
                !str_starts_with($permission->title, 'transaction_create') &&
                !str_starts_with($permission->title, 'transaction_edit') &&
                !str_starts_with($permission->title, 'role_') &&
                !str_starts_with($permission->title, 'permission_') &&
                !str_starts_with($permission->title, 'permission_role_') &&
                !str_starts_with($permission->title, 'activity_log_');
        });
        Role::findOrFail(2)->permissions()->sync($staffPermission);
    }
}
