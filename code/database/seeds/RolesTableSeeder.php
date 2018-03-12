<?php

use Illuminate\Database\Seeder;
use NF\Roles\Models\Permission;
use NF\Roles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin = Role::updateOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        $content = Role::updateOrCreate([
            'name' => 'Content',
            'slug' => 'content',
        ]);

        $customer = Role::updateOrCreate([
            'name' => 'Customer',
            'slug' => 'customer',
        ]);

        $admin->permissions()->sync($permissions->pluck('id'));
    }
}
