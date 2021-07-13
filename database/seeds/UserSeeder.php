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
                'address' => 'Via Morigi, 8',
                'city' => 'Milano',
                'p_iva' => '98765432160',
                'img_path' => 'users-cover/ristorante-1.jpg',
                'type_id' => 1
            ],
            [
                'company_name' => 'Le Delizie',
                'password' => 'ledelizie',
                'email' => 'ledelizie@email.it',
                'address' => 'Via Ernesto Breda, 48',
                'city' => 'Milano',
                'p_iva' => '98765432161',
                'img_path' => 'users-cover/ristorante-2.jpg',
                'type_id' => 1
            ],
            [
                'company_name' => 'La Piadineria - Bicocca Village',
                'password' => 'lapiadineria',
                'email' => 'lapiadineria@email.it',
                'address' => 'Viale Sarca angolo Via Chiese, 14',
                'city' => 'Milano',
                'p_iva' => '98765432162',
                'img_path' => 'users-cover/ristorante-3.jpg',
                'type_id' => 1
            ],
            [
                'company_name' => 'Ristorante Morganti',
                'password' => 'morganti',
                'email' => 'morganti@email.it',
                'address' => 'Via Luciano Morganti, 24',
                'city' => 'Sesto San Giovanni',
                'p_iva' => '98765432163',
                'img_path' => 'users-cover/ristorante-4.jpg',
                'type_id' => 2
            ],
            [
                'company_name' => 'Il Gatto E La Volpe',
                'password' => 'gattovolpe',
                'email' => 'gattovolpe@email.it',
                'address' => 'Via Paulucci, 4',
                'city' => 'Milano',
                'p_iva' => '98765432164',
                'img_path' => 'users-cover/ristorante-5.jpg',
                'type_id' => 9
            ],
            [
                'company_name' => 'Sapori del Salento',
                'password' => 'saporisalento',
                'email' => 'saporisalento@email.it',
                'address' => 'Viale Fulvio Testi, 132',
                'city' => 'cinisello Balsamo',
                'p_iva' => '98765432165',
                'img_path' => 'users-cover/ristorante-6.jpg',
                'type_id' => 1
            ],
            [
                'company_name' => 'Il Faro',
                'password' => 'ilfaro',
                'email' => 'ilfaro@email.it',
                'address' => 'Via Emilio de Martino, 1',
                'city' => 'Milano',
                'p_iva' => '98765432166',
                'img_path' => 'users-cover/ristorante-7.jpg',
                'type_id' => 1
            ],
            [
                'company_name' => 'Street Food Garage',
                'password' => 'streetfood',
                'email' => 'streetfood@email.it',
                'address' => 'Largo Alfonso Lamarmora, 23',
                'city' => 'sesto San Giovanni',
                'p_iva' => '98765432167',
                'img_path' => 'users-cover/ristorante-8.jpg',
                'type_id' => 9
            ],
            [
                'company_name' => 'La Pizza Giusta di Mimmo',
                'password' => 'mimmopizza',
                'email' => 'mimmopizza@email.it',
                'address' => 'Viale Antonio Gramsci, 81',
                'city' => 'Sesto San Giovanni',
                'p_iva' => '98765432168',
                'img_path' => 'users-cover/ristorante-9.jpg',
                'type_id' => 9
            ],
            [
                'company_name' => 'Fratelli la Bufala',
                'password' => 'fratellibufala',
                'email' => 'fratellibufala@email.it',
                'address' => 'Viale Fulvio Testi, 49',
                'city' => 'Cinisello Balsamo',
                'p_iva' => '98765432169',
                'img_path' => 'users-cover/ristorante-10.jpg',
                'type_id' => 9
            ],
            [
                'company_name' => 'La Basilicata',
                'password' => 'labasilicata',
                'email' => 'labasilicata@email.it',
                'address' => 'Via Emilio de Marchi, 44',
                'city' => 'Milano',
                'p_iva' => '98765432170',
                'img_path' => 'users-cover/ristorante-11.jpg',
                'type_id' => 1
            ],
            [
                'company_name' => 'Ristorante Pizzeria Gioia 53',
                'password' => 'gioia53',
                'email' => 'gioia53@email.it',
                'address' => 'Via Melchiorre Gioia, 53',
                'city' => 'Milano',
                'p_iva' => '98765432171',
                'img_path' => 'users-cover/ristorante-12.jpg',
                'type_id' => 2
            ]
        ];

        foreach ($restaurants as $restaurant) {
            $user = new User();
            $user->company_name = $restaurant['company_name'];
            $user->email = $restaurant['email'];
            $user->password = bcrypt($restaurant['password']);
            $user->address = $restaurant['address'];
            $user->city = $restaurant['city'];
            $user->p_iva = $restaurant['p_iva'];
            $user->img_path = $restaurant['img_path'];
            $user->type_id = $restaurant['type_id'];
            $user->save();
        }
    }
}
