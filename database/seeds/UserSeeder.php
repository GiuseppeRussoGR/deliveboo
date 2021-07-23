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
            ],
            [
                'company_name' => 'Le Delizie',
                'password' => 'ledelizie',
                'email' => 'ledelizie@email.it',
                'address' => 'Via Ernesto Breda, 48',
                'city' => 'Milano',
                'p_iva' => '98765432161',
                'img_path' => 'users-cover/ristorante-2.jpg',
            ],
            [
                'company_name' => 'La Piadineria - Bicocca Village',
                'password' => 'lapiadineria',
                'email' => 'lapiadineria@email.it',
                'address' => 'Viale Sarca angolo Via Chiese, 14',
                'city' => 'Milano',
                'p_iva' => '98765432162',
                'img_path' => 'users-cover/ristorante-3.jpg',
            ],
            [
                'company_name' => 'Ristorante Morganti',
                'password' => 'morganti',
                'email' => 'morganti@email.it',
                'address' => 'Via Luciano Morganti, 24',
                'city' => 'Sesto San Giovanni',
                'p_iva' => '98765432163',
                'img_path' => 'users-cover/ristorante-4.jpg',
            ],
            [
                'company_name' => 'Il Gatto E La Volpe',
                'password' => 'gattovolpe',
                'email' => 'gattovolpe@email.it',
                'address' => 'Via Paulucci, 4',
                'city' => 'Milano',
                'p_iva' => '98765432164',
                'img_path' => 'users-cover/ristorante-5.jpg',
            ],
            [
                'company_name' => 'Sapori del Salento',
                'password' => 'saporisalento',
                'email' => 'saporisalento@email.it',
                'address' => 'Viale Fulvio Testi, 132',
                'city' => 'cinisello Balsamo',
                'p_iva' => '98765432165',
                'img_path' => 'users-cover/ristorante-6.jpg',
            ],
            [
                'company_name' => 'Il Faro',
                'password' => 'ilfaro',
                'email' => 'ilfaro@email.it',
                'address' => 'Via Emilio de Martino, 1',
                'city' => 'Milano',
                'p_iva' => '98765432166',
                'img_path' => 'users-cover/ristorante-7.jpg',
            ],
            [
                'company_name' => 'Street Food Garage',
                'password' => 'streetfood',
                'email' => 'streetfood@email.it',
                'address' => 'Largo Alfonso Lamarmora, 23',
                'city' => 'sesto San Giovanni',
                'p_iva' => '98765432167',
                'img_path' => 'users-cover/ristorante-8.jpg',
            ],
            [
                'company_name' => 'La Pizza Giusta di Mimmo',
                'password' => 'mimmopizza',
                'email' => 'mimmopizza@email.it',
                'address' => 'Viale Antonio Gramsci, 81',
                'city' => 'Sesto San Giovanni',
                'p_iva' => '98765432168',
                'img_path' => 'users-cover/ristorante-9.jpg',
            ],
            [
                'company_name' => 'Fratelli la Bufala',
                'password' => 'fratellibufala',
                'email' => 'fratellibufala@email.it',
                'address' => 'Viale Fulvio Testi, 49',
                'city' => 'Cinisello Balsamo',
                'p_iva' => '98765432169',
                'img_path' => 'users-cover/ristorante-10.jpg',
            ],
            [
                'company_name' => 'La Basilicata',
                'password' => 'labasilicata',
                'email' => 'labasilicata@email.it',
                'address' => 'Via Emilio de Marchi, 44',
                'city' => 'Milano',
                'p_iva' => '98765432170',
                'img_path' => 'users-cover/ristorante-11.jpg',
            ],
            // internazionale
            [
                'company_name' => 'Ristorante Pizzeria Gioia 53',
                'password' => 'gioia53',
                'email' => 'gioia53@email.it',
                'address' => 'Via Melchiorre Gioia, 53',
                'city' => 'Milano',
                'p_iva' => '98765432171',
                'img_path' => 'users-cover/ristorante-12.jpg',
            ],
            [
                'company_name' => 'Avo Brothers Isola',
                'password' => 'avobrothers',
                'email' => 'avobrothers@email.it',
                'address' => 'Via Lambertenghi, 17',
                'city' => 'Milano',
                'p_iva' => '98765432172',
                'img_path' => 'users-cover/avo-brothers.jpg',
            ],
            // cinesi
            [
                'company_name' => 'Jubin Due - Ristorante Cinese',
                'password' => 'jubindue',
                'email' => 'jubindue@email.it',
                'address' => 'Via Padova, 7',
                'city' => 'Milano',
                'p_iva' => '98765432173',
                'img_path' => 'users-cover/jubin-due.jpg',
            ],
            [
                'company_name' => 'Yuebinlou',
                'password' => 'yuebinlou',
                'email' => 'yuebinlou@email.it',
                'address' => 'Via Paolo Sarpi, 42',
                'city' => 'Milano',
                'p_iva' => '98765432174',
                'img_path' => 'users-cover/yuebinlou.jpg',
            ],
            // giapponesi
            [
                'company_name' => 'Sakura',
                'password' => 'sakura',
                'email' => 'sakura@email.it',
                'address' => 'Via Nicola Antonio Porpora, 59',
                'city' => 'Milano',
                'p_iva' => '98765432175',
                'img_path' => 'users-cover/sakura.jpg',
            ],
            [
                'company_name' => 'Mookuzai',
                'password' => 'mookuzai',
                'email' => 'mookuzai@email.it',
                'address' => 'Via Arona, 18',
                'city' => 'Milano',
                'p_iva' => '98765432176',
                'img_path' => 'users-cover/mookuzai.jpg',
            ],
            // messicani
            [
                'company_name' => 'Piedra Del Sol',
                'password' => 'piedradelsol',
                'email' => 'piedradelsol@email.it',
                'address' => 'Via Emilio Cornalia, 2',
                'city' => 'Milano',
                'p_iva' => '98765432177',
                'img_path' => 'users-cover/piedra.jpg',
            ],
            [
                'company_name' => 'La Parrilla Mexicana',
                'password' => 'parrilla',
                'email' => 'parrilla@email.it',
                'address' => 'Corso Sempione, 76',
                'city' => 'Milano',
                'p_iva' => '98765432178',
                'img_path' => 'users-cover/parrilla.jpg',
            ],
            // indiano
            [
                'company_name' => 'Tara Ristorante Indiano',
                'password' => 'tara',
                'email' => 'tara@email.it',
                'address' => 'Via Domenico Cirillo, 16',
                'city' => 'Milano',
                'p_iva' => '98765432179',
                'img_path' => 'users-cover/tara.jpg',
            ],
            [
                'company_name' => 'Taj Mahal',
                'password' => 'tajmahal',
                'email' => 'tajmahal@email.it',
                'address' => 'Via Lambertenghi, 23',
                'city' => 'Milano',
                'p_iva' => '98765432180',
                'img_path' => 'users-cover/taj-mahal.jpg',
            ],
            // vegetariano
            [
                'company_name' => 'Panghea',
                'password' => 'panghea',
                'email' => 'panghea@email.it',
                'address' => 'Via Valenza, 5',
                'city' => 'Milano',
                'p_iva' => '98765432181',
                'img_path' => 'users-cover/panghea.jpg',
            ],
            [
                'company_name' => 'Arcobaleno Vegetariano',
                'password' => 'arcobaleno',
                'email' => 'arcobaleno@email.it',
                'address' => 'Via Carlo Maronchetti, 7',
                'city' => 'Milano',
                'p_iva' => '98765432182',
                'img_path' => 'users-cover/arcobaleno.jpg',
            ],
            // thailandese
            [
                'company_name' => 'Bussarakham',
                'password' => 'bussarakham',
                'email' => 'bussarakham@email.it',
                'address' => 'Via Valenza, 13',
                'city' => 'Milano',
                'p_iva' => '98765432183',
                'img_path' => 'users-cover/bussarakham.jpg',
            ],
            [
                'company_name' => 'Komenn Thai',
                'password' => 'komenn',
                'email' => 'komenn@email.it',
                'address' => 'Via Lazzaro Papi, 5',
                'city' => 'Milano',
                'p_iva' => '98765432184',
                'img_path' => 'users-cover/komenn.jpg',
            ],
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
            $user->save();
        }
    }
}
