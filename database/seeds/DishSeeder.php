<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'name' => 'Risotto allo zafferano',
                'description' => 'Risotto giallo',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 2,
                'user_id' => 2
            ],
            [
                'name' => 'Risotto allo zafferano',
                'description' => 'Risotto giallo',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 2,
                'user_id' => 2
            ],
            [
                'name' => 'Risotto allo zafferano',
                'description' => 'Risotto giallo',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 2,
                'user_id' => 2
            ],
            [
                'name' => 'Risotto allo zafferano',
                'description' => 'Risotto giallo',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 2,
                'user_id' => 1
            ],
            [
                'name' => 'Risotto allo zafferano',
                'description' => 'Risotto giallo',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 2,
                'user_id' => 1
            ],
            [
                'name' => 'Risotto allo zafferano',
                'description' => 'Risotto giallo',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 2,
                'user_id' => 1
            ]
        ];
        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->name = $dish['name'];
            $new_dish->description = $dish['description'];
            $new_dish->price = $dish['price'];
            $new_dish->visibility = $dish['visibility'];
            $new_dish->category_id = $dish['category_id'];
            $new_dish->user_id = $dish['user_id'];
            $new_dish->save();
        }
    }
}
