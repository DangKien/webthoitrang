<?php

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\en_SG\Address($faker));
        $faker->addProvider(new Faker\Provider\en_US\Company($faker));
        $faker->addProvider(new Faker\Provider\DateTime($faker));
        $faker->addProvider(new Faker\Provider\Lorem($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        $images = [
            '/assets/images/demo/posts/demo1.jpg',
            '/assets/images/demo/posts/demo2.jpg',
            '/assets/images/demo/posts/demo3.jpg',
            '/assets/images/demo/posts/demo4.jpg',
            '/assets/images/demo/posts/demo5.jpg',
        ];

        $user = User::where('email', '=', 'admin@webthoitrang.com')->first();

        for ($i = 0; $i < 10; $i++) {
            $news            = new News;
            $news->title     = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $news->slug      = $faker->slug;
            $news->image     = $faker->randomElement($images);
            $news->excerpt   = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $news->content   = $faker->paragraphs($nb = 30, $asText = true);
            $news->status    = News::STATUS_PUBLISH;
            $news->user_id   = $user->id;
            $news->post_type = 'news';
            $news->save();
        }
    }
}
