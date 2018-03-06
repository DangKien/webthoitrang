<?php

use Illuminate\Database\Seeder;

class SizeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size')->insert([
                    ['name' => 'S'],
                    ['name' => 'M'],
                    ['name' => 'L'],
                    ['name' => 'XL'],
                    ['name' => 'XXL'],
                ]);
    }
}
