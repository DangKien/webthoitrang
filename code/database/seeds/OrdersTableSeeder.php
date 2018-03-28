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
            'assets/images/demo/posts/demo1.jpg',
            'assets/images/demo/posts/demo2.jpg',
            'assets/images/demo/posts/demo3.jpg',
            'assets/images/demo/posts/demo4.jpg',
            'assets/images/demo/posts/demo5.jpg',
        ];

        $data = [
            [
                'data'        => json_encode([
                    [
                        'product'  => [
                            'id'        => 1,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 130000,
                        ],
                        'quantity' => 1,
                    ],
                    [
                        'product'  => [
                            'id'        => 2,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 150000,
                        ],
                        'quantity' => 2,
                    ],
                    [
                        'product'  => [
                            'id'        => 3,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 170000,
                        ],
                        'quantity' => 1,
                    ], [
                        'product'  => [
                            'id'        => 4,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 300000,
                        ],
                        'quantity' => 2,
                    ],
                ]),
                'address'     => $faker->address,
                'total'       => 900000,
                'total_order' => 900000,
                'status'      => Order::STATUS_PROCCESSING,
                'user_id'     => 1,
            ],
            [
                'data'        => json_encode([
                    [
                        'product'  => [
                            'id'        => 1,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 130000,
                        ],
                        'quantity' => 2,
                    ],
                    [
                        'product'  => [
                            'id'        => 6,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 150000,
                        ],
                        'quantity' => 2,
                    ],
                    [
                        'product'  => [
                            'id'        => 9,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 170000,
                        ],
                        'quantity' => 2,
                    ], [
                        'product'  => [
                            'id'        => 11,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 150000,
                        ],
                        'quantity' => 2,
                    ],
                ]),
                'address'     => $faker->address,
                'total'       => 1200000,
                'total_order' => 1200000,
                'status'      => Order::STATUS_PROCCESSING,
                'user_id'     => 2,
            ],
            [
                'data'        => json_encode([
                    [
                        'product'  => [
                            'id'        => 1,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 130000,
                        ],
                        'quantity' => 1,
                    ],
                ]),
                'address'     => $faker->address,
                'total'       => 130000,
                'total_order' => 130000,
                'status'      => Order::STATUS_PROCCESSING,
                'user_id'     => 3,
            ],
            [
                'data'        => json_encode([
                    [
                        'product'  => [
                            'id'        => 1,
                            'name'      => $faker->sentence($nbWords = 5, $variableNbWords = true),
                            'url_image' => $faker->randomElement($images),
                            'price'     => 140000,
                        ],
                        'quantity' => 2,
                    ],
                ]),
                'address'     => $faker->address,
                'total'       => 280000,
                'total_order' => 280000,
                'status'      => Order::STATUS_PROCCESSING,
                'user_id'     => 3,
            ],
        ];

        foreach ($data as $key => $item) {
            $user = Order::Create($item);
        }
    }
}
