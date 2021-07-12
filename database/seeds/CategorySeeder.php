<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Antipasti',
            'Primi',
            'Secondi',
            'Contorno',
            'Dolce'
        ];
        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->save();
        }
    }
}
