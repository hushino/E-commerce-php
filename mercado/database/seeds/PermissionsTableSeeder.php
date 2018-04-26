<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Users Role
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'special' => 'all-access'
        ]);

        // Users Permission
        Permission::create([
            'name' => 'admin usuarios',
            'slug' => 'users.admin',
            'description' => 'Lista y navega todos los usuarios del sistema'
        ]);
    }
}
