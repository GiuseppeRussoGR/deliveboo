<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $restaurants = [
            [
                'company_name' => 'Taverna Moriggi',
                'password' => 'taverna',
                'email' => 'taverna@email.it',
                'address' => 'Via Morigi, 8, Milano',
                'p_iva' => '98765432165',
                'type_id' => 1
            ],
            [
                'company_name' => 'Usodimare & Mino on The Beach',
                'password' => 'usodimare',
                'email' => 'usodimare@email.it',
                'address' => 'Via Flacca Km 20, Gaeta',
                'p_iva' => '65498732165',
                'type_id' => 2
            ]
        ];

        foreach ($restaurants as $restaurant) {
            $user = new User();
            $user->email = $restaurant['email'];
            $user->password = bcrypt($restaurant['password']);
            $user->company_name = $restaurant['company_name'];
            $user->address = $restaurant['address'];
            $user->p_iva = $restaurant['p_iva'];
            $user->type_id = $restaurant['type_id'];
            $user->save();
        }
    }
}
