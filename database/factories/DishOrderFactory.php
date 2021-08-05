<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DishOrder;
use App\Order;
use App\Dish;
use Faker\Generator as Faker;

$factory->define(DishOrder::class, function (Faker $faker) {
    return [
        'dish_id' => Dish::all()->random()->id,
        'order_id' => Order::all()->random()->id,
        'quantita' => $faker->randomDigitNot(0)
    ];
});
