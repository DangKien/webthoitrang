<?php

use Illuminate\Database\Seeder;
use NF\Roles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::updateOrCreate([
            'slug' => 'view.roles',
        ], [
            'name'        => 'View Roles',
            'slug'        => 'view.roles',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.roles',
        ], [
            'name'        => 'Create Roles',
            'slug'        => 'create.roles',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.roles',
        ], [
            'name'        => 'Update Roles',
            'slug'        => 'update.roles',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.roles',
        ], [
            'name' => 'Delete Roles',
            'slug' => 'delete.roles',
        ]);

        // Users
        Permission::updateOrCreate([
            'slug' => 'view.users',
        ], [
            'name'        => 'View Users',
            'slug'        => 'view.users',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.users',
        ], [
            'name'        => 'Create Users',
            'slug'        => 'create.users',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.users',
        ], [
            'name'        => 'Update Users',
            'slug'        => 'update.users',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.users',
        ], [
            'name' => 'Delete Users',
            'slug' => 'delete.users',
        ]);

        // Categories
        Permission::updateOrCreate([
            'slug' => 'view.categories',
        ], [
            'name'        => 'View Categories',
            'slug'        => 'view.categories',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.categories',
        ], [
            'name'        => 'Create Categories',
            'slug'        => 'create.categories',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.categories',
        ], [
            'name'        => 'Update Categories',
            'slug'        => 'update.categories',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.categories',
        ], [
            'name' => 'Delete Categories',
            'slug' => 'delete.categories',
        ]);

        // Posts
        Permission::updateOrCreate([
            'slug' => 'view.posts',
        ], [
            'name'        => 'View Posts',
            'slug'        => 'view.posts',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.posts',
        ], [
            'name'        => 'Create Posts',
            'slug'        => 'create.posts',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.posts',
        ], [
            'name'        => 'Update Posts',
            'slug'        => 'update.posts',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.posts',
        ], [
            'name' => 'Delete Posts',
            'slug' => 'delete.posts',
        ]);

        // tags
        Permission::updateOrCreate([
            'slug' => 'view.tags',
        ], [
            'name'        => 'View tags',
            'slug'        => 'view.tags',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.tags',
        ], [
            'name'        => 'Create tags',
            'slug'        => 'create.tags',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.tags',
        ], [
            'name'        => 'Update tags',
            'slug'        => 'update.tags',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.tags',
        ], [
            'name'        => 'Delete tags',
            'slug'        => 'delete.tags',
            'description' => '',
        ]);

        // comments
        Permission::updateOrCreate([
            'slug' => 'view.comments',
        ], [
            'name'        => 'View comments',
            'slug'        => 'view.comments',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.comments',
        ], [
            'name'        => 'Create comments',
            'slug'        => 'create.comments',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.comments',
        ], [
            'name'        => 'Update comments',
            'slug'        => 'update.comments',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.comments',
        ], [
            'name'        => 'Delete comments',
            'slug'        => 'delete.comments',
            'description' => '',
        ]);

        // Products
        Permission::updateOrCreate([
            'slug' => 'view.products',
        ], [
            'name'        => 'View Products',
            'slug'        => 'view.products',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'create.products',
        ], [
            'name'        => 'Create Products',
            'slug'        => 'create.products',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'update.products',
        ], [
            'name'        => 'Update Products',
            'slug'        => 'update.products',
            'description' => '',
        ]);

        Permission::updateOrCreate([
            'slug' => 'delete.products',
        ], [
            'name'        => 'Delete Products',
            'slug'        => 'delete.products',
            'description' => '',
        ]);
    }
}
