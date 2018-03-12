<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use NF\Roles\Models\Role;

class UsersTableSeeder extends Seeder
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
        $faker->addProvider(new Faker\Provider\Internet($faker));

        $adminRole    = Role::find(1);
        $contentRole  = Role::find(2);
        $customerRole = Role::find(3);

        $users = [
            'admin'    => [
                'first_name' => 'Admin',
                'last_name'  => '',
                'email'      => 'admin@webthoitrang.com',
                'role'       => 'adminRole',
                'active'     => 1,
            ],
            'content'  => [
                'first_name' => 'Admin',
                'last_name'  => '',
                'email'      => 'content@webthoitrang.com',
                'role'       => 'contentRole',
                'active'     => 1,
            ],
            'customer' => [
                'first_name' => 'Customer',
                'last_name'  => '',
                'email'      => 'customer@webthoitrang.com',
                'role'       => 'customerRole',
                'active'     => 1,
            ],
        ];

        for ($i = 1; $i < 15; $i++) {
            $key         = 'student' . $i;
            $first_name  = 'Student ' . $i;
            $users[$key] = [
                'first_name' => $first_name,
                'last_name'  => '',
                'email'      => $key . '@webthoitrang.com',
                'role'       => 'contentRole',
                'active'     => 1,
            ];
        }

        foreach ($users as $item) {
            $user_data = [
                'email'      => $item['email'],
                'first_name' => $item['first_name'],
                'last_name'  => $item['last_name'],
                'password'   => Hash::make('secret'),
            ];

            $user = User::updateOrCreate([
                'email' => $item['email'],
            ], $user_data);

            $user->status      = User::STATUS_ACTIVE;
            $user->description = 'nothing';
            $user->save();
            $user->attachRole(${$item['role']});
        }

        for ($i = 0; $i < 5; $i++) {
            $gender = 'male';
            $email  = $faker->email();

            $user_data = [
                'email'      => $email,
                'first_name' => $faker->firstName($gender),
                'last_name'  => $faker->lastName($gender),
                'password'   => Hash::make('secret'),
            ];

            $user = User::updateOrCreate([
                'email' => $email,
            ], $user_data);

            $user->status = User::STATUS_ACTIVE;
            $user->save();
            $user->attachRole($contentRole);
        }

        for ($i = 0; $i < 20; $i++) {
            $gender = 'male';
            $email  = $faker->email();

            $user_data = [
                'email'      => $email,
                'first_name' => $faker->firstName($gender),
                'last_name'  => $faker->lastName($gender),
                'password'   => Hash::make('secret'),
            ];

            $user = User::updateOrCreate([
                'email' => $email,
            ], $user_data);

            $user->status = User::STATUS_ACTIVE;
            $user->save();
            $user->attachRole($customerRole);
        }
    }
}
