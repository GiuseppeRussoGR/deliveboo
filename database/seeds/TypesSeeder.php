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
            'Italiano',
            'Internazionale',
            'Cinese',
            'Giapponese',
            'Messicano',
            'Indiano',
            'Pesce',
            'Carne',
            'Pizza'
        ];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->save();
        }
    }
}
