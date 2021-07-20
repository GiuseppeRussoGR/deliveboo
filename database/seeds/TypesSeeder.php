<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Italiano' => 'types-cover/icons8-spaghetti-64.png',
            'Internazionale' => 'types-cover/icons8-international-food-50.png',
            'Cinese' => 'types-cover/icons8-chinese-noodle-50.png',
            'Giapponese' => 'types-cover/icons8-sushi-50.png',
            'Messicano' => 'types-cover/icons8-burrito-50.png',
            'Indiano' => 'types-cover/icons8-naan-50.png',
            'Vegetariano' => 'types-cover/icons8-vegetarian-food-50.png',
            'Thailandese' => 'types-cover/icons8-piatto-di-zuppa-50.png',
            'Greco' => 'types-cover/icons8-greek-pillar-50.png',
            'Pesce' => 'types-cover/icons8-dressed-fish-50.png',
            'Carne' => 'types-cover/icons8-meat-50.png',
            'Pizza' => 'types-cover/icons8-pizza-50.png'
        ];

        foreach ($types as $value=>$type) {
            $new_type = new Type();
            $new_type->name = $value;
            $new_type->image_path = $type;
            $new_type->save();
        }
    }
}
