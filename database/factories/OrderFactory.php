<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'total_price' => $faker->randomFloat(2, 1, 1000),
        'payment_status' => $faker->randomElement(['accepted', 'pending', 'rejected']),
        'client_code' => $faker->uuid,
        'client_name' => $faker->name,
        'client_address' => $faker->address,
        'client_number' => $faker->randomNumber(5, false),
        'client_email' => $faker->unique()->safeEmail,
        'created_at' =>  $faker->dateTimeInInterval('-5 years', '+2 years'),
        'updated_at' =>  $faker->dateTimeInInterval('-5 years', '+2 years')
    ];
});
