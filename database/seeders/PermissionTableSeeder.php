<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'NUll',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'products-list',
            'products-create',
            'products-edit',
            'products-delete',
            'order-list',
            'order-delete',
            'order-edit',
            'Categories-list',
            'Categories-create',
            'Categories-edit',
            'Categories-delete',
            'brand-list',
            'brand-create',
            'brand-edit',
            'brand-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'site_control-list',
            'site_control-create',
            'site_control-edit',
            'site_control-delete',
            'Settings',
            'Dashboard',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'admin','name' => $permission]);
        }
    }
}
