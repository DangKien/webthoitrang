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
        $this->call(PromotionSeed::class);
        $this->call(CategorySeed::class);
        $this->call(SizeSeed::class);
    }
}
