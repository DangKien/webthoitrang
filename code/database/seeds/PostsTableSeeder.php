<?php

use App\Entities\Category;
use App\Entities\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all(['id']);

        // factory(Post::class, 30)->create()->each(function ($post) use ($categories) {
        //     $post->categories()->sync([$categories->random()->id]);
        // });

    }
}
