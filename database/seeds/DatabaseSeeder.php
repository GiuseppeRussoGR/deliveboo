<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    //Putting all seeders together in order to run them all in one single command
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DishSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(DishOrderSeeder::class);
    }
}
