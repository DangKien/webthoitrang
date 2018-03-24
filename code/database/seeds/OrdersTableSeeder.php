<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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
            url('assets/images/demo/posts/demo1.jpg'),
            url('assets/images/demo/posts/demo2.jpg'),
            url('assets/images/demo/posts/demo3.jpg'),
            url('assets/images/demo/posts/demo4.jpg'),
            url('assets/images/demo/posts/demo5.jpg'),
        ];

        $data = [
            [
                'info_order'  => json_encode([
                    [
                        'id'        => 1,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 1,
                        'price'     => 130000,
                    ],
                    [
                        'id'        => 2,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 2,
                        'price'     => 150000,
                    ],
                    [
                        'id'        => 3,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 1,
                        'price'     => 170000,
                    ], [
                        'id'        => 4,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 2,
                        'price'     => 300000,
                    ],
                ]),
                'total'       => 900000,
                'total_order' => 900000,
                'status'      => Order::STATUS_PROCCESSING,
                'user_id'     => 1,
            ],
            [
                'info_order'  => json_encode([
                    [
                        'id'        => 1,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 2,
                        'price'     => 130000,
                    ],
                    [
                        'id'        => 6,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 2,
                        'price'     => 150000,
                    ],
                    [
                        'id'        => 9,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 2,
                        'price'     => 170000,
                    ], [
                        'id'        => 11,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 2,
                        'price'     => 150000,
                    ],
                ]),
                'total'       => 1200000,
                'total_order' => 1200000,
                'status'      => Order::STATUS_PROCCESSING,
                'user_id'     => 2,
            ],
            [
                'info_order'  => json_encode([
                    [
                        'id'        => 1,
                        'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                        'url_image' => $faker->randomElement($images),
                        'quantity'  => 1,
                        'price'     => 130000,
                    ],
                ]),
                'total'       => 130000,
                'total_order' => 130000,
                'status'      => Order::STATUS_PROCCESSING,
                'user_id'     => 3,
            ],
        ];

        foreach ($data as $key => $item) {
            $user = Order::Create($item);
        }
    }
}
