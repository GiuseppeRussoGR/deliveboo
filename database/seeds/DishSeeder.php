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
                'name' => 'Spaghetti alla Carbonara',
                'description' => 'Spaghetti alla Carbonara',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/spaghetti-carbonara.jpg',
                'user_id' => 1
            ],
            [
                'name' => 'Parmigiana di melanzane',
                'description' => 'Parmigiana di melanzane',
                'price' => 12.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/parmigiana-di-melanzane.jpg',
                'user_id' => 1
            ],
            [
                'name' => 'New York Cheesecake',
                'description' => 'New York Cheesecake',
                'price' => 7.00,
                'visibility' => 1,
                'category_id' => 5,
                'img_path' => 'dishes-cover/newyork-cheesecake.jpg',
                'user_id' => 1
            ],
            [
                'name' => 'Risotto allo Zafferano',
                'description' => 'Risotto allo Zafferano',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/risotto-zafferano.jpg',
                'user_id' => 1
            ],
            [
                'name' => 'Polpette di zucchine',
                'description' => 'Polpette di zucchine',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/polpette-di-zucchine.jpg',
                'user_id' => 1
            ],
            // avo brothers
            [
                'name' => 'Pink Burger',
                'description' => 'Avocado, lattuga, barbabietola e maionese',
                'price' => 15.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/pink-burger.jpeg',
                'user_id' => 13
            ],
        ];
        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->name = $dish['name'];
            $new_dish->description = $dish['description'];
            $new_dish->price = $dish['price'];
            $new_dish->visibility = $dish['visibility'];
            $new_dish->category_id = $dish['category_id'];
            $new_dish->img_path = $dish['img_path'];
            $new_dish->user_id = $dish['user_id'];
            $new_dish->save();
        }
    }
}
