<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++)
        {
            DB::table('orders')->insert(
                [
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'address' => $faker->address,
                    'phone' => $faker->phoneNumber,
                    'status' => random_int(0,3),
                    'user_id' => random_int(1,10),
                    'date' => $faker->dateTime,
                    'price_shipping' => random_int(10000, 1000000),
                    'payment_id' => random_int(1,4),
                ]
            );
        }
    }
}
