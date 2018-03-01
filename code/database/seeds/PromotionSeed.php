<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PromotionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
                    ['name' => 'Giảm giá'],
                    ['name' => 'Tặng Kèm'],
                    ['name' => 'Hàng mới'],
                ]);
    }
}
