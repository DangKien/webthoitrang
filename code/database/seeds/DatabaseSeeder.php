<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PromotionSeed::class);
        $this->call(CategorySeed::class);
        $this->call(SizeSeed::class);
        $this->call(NewsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
