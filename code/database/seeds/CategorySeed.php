<?php

use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('category')->insert([
                    ['name' => 'Quần áo nam', 'slug'=>'quan-ao-nam', 'url_link'=> url('category/quan-ao-nam'), 'tag'=>'', 'user_create'=> 1, 'parent_id'=>'0'],

                    ['name' => 'Quần áo nữ', 'slug'=>'quan-ao-nu', 'url_link'=> url('category/quan-ao-nu'), 'tag'=>'', 'user_create'=>1, 'parent_id'=>'0'],

                    ['name' => 'Bé nam', 'slug'=>'be-nam', 'url_link'=> url('category/be-nam'), 'tag'=>'', 'user_create'=>1, 'parent_id'=>'0'],

                    ['name' => 'Bé nữ', 'slug'=>'be-nu', 'url_link'=> url('category/be-nu'), 'tag'=>'', 'user_create'=>1, 'parent_id'=>'0'],

                    ['name' => 'Phụ kiện', 'slug'=>'phu-kien', 'url_link'=> url('category/phu-kien'), 'tag'=>'', 'user_create'=>1, 'parent_id'=>'0'],
                ]);
    }
}
