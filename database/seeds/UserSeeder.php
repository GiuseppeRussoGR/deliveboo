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
            //Pesce - Carne
            [
                'company_name' => 'Finger\'s Garden',
                'password' => 'garden',
                'email' => 'garden@email.it',
                'address' => 'Via Keplero, 2',
                'city' => 'Milano',
                'p_iva' => '98765432160',
                'img_path' => 'users-cover/fingers-ante.jpg',
                'type_id' => [10,11]
            ],
            //Italiano - Carne
            [
                'company_name' => 'Ribot - Milano dal 1975',
                'password' => 'ribot',
                'email' => 'ribot@email.it',
                'address' => 'Via Ruggero di Lauria, 17',
                'city' => 'Milano',
                'p_iva' => '98765432161',
                'img_path' => 'users-cover/ribot.jpg',
                'type_id' => [1,11]
            ],
            //Giapponese - Carne
            [
                'company_name' => 'Zero Milano',
                'password' => 'zero',
                'email' => 'zero@email.it',
                'address' => 'Corso Magenta, 87',
                'city' => 'Milano',
                'p_iva' => '98765432162',
                'img_path' => 'users-cover/zero.jpg',
                'type_id' => [4,11]
            ],
            //Giapponese - Messicano - Internazionale
            [
                'company_name' => 'Pacifico',
                'password' => 'pacifico',
                'email' => 'pacifico@email.it',
                'address' => 'Via Moscova, 29',
                'city' => 'Milano',
                'p_iva' => '98765432163',
                'img_path' => 'users-cover/pacifico.jpg',
                'type_id' => [4,5,2]
            ],
            //Cinese
            [
                'company_name' => 'Singapore',
                'password' => 'singapore',
                'email' => 'singapore@email.it',
                'address' => 'Via Vincenzo Foppa, 40',
                'city' => 'Milano',
                'p_iva' => '98765432164',
                'img_path' => 'users-cover/singapore.jpg',
                'type_id' => 3
            ],
            //Pizza - Italiano
            [
                'company_name' => 'Little Italy - Via Tadino',
                'password' => 'italy',
                'email' => 'italy@email.it',
                'address' => 'Via Alessandro Tadino, 41',
                'city' => 'Milano',
                'p_iva' => '98765432165',
                'img_path' => 'users-cover/littleitaly.jpg',
                'type_id' => [1,12]
            ],
            //Vegetariano
            [
                'company_name' => 'BIO.IT',
                'password' => 'bio',
                'email' => 'bio@email.it',
                'address' => 'Via Federico Confalonieri, 8',
                'city' => 'Milano',
                'p_iva' => '98765432166',
                'img_path' => 'users-cover/bioit.jpg',
                'type_id' => 7
            ],
            //Indiano
            [
                'company_name' => 'Taj Mahal',
                'password' => 'tajmahal',
                'email' => 'tajmahal@email.it',
                'address' => 'Via Lambertenghi, 23',
                'city' => 'Milano',
                'p_iva' => '98765432167',
                'img_path' => 'users-cover/taj-mahal.jpg',
                'type_id' => 6
            ],
            
            //Greco
            [
                'company_name' => 'Taverna Greca Mykonos',
                'password' => 'mykonos',
                'email' => 'tavernamykonos@email.it',
                'address' => 'Via Tofane, 5',
                'city' => 'Milano',
                'p_iva' => '98765432168',
                'img_path' => 'users-cover/taverna-greca.jpg',
                'type_id' => 9
            ],
            //Italiano - Pesce
            [
                'company_name' => 'Le Delizie',
                'password' => 'ledelizie',
                'email' => 'ledelizie@email.it',
                'address' => 'Via Ernesto Breda, 48',
                'city' => 'Milano',
                'p_iva' => '98765432169',
                'img_path' => 'users-cover/delizie.jpg',
                'type_id' => [1,10]
            ],
            //Italiano - Pesce - Carne
            [
                'company_name' => 'Morganti',
                'password' => 'morganti',
                'email' => 'morganti@email.it',
                'address' => 'Via Luciano Morganti, 24',
                'city' => 'Sesto San Giovanni',
                'p_iva' => '98765432170',
                'img_path' => 'users-cover/morganti.jpg',
                'type_id' => [1,10,11]
            ],
            //Thailandese
            [
                'company_name' => 'Bussarakham',
                'password' => 'bussarakham',
                'email' => 'bussarakham@email.it',
                'address' => 'Via Valenza, 13',
                'city' => 'Milano',
                'p_iva' => '98765432171',
                'img_path' => 'users-cover/bussarakham.jpg',
                'type_id' => 8
            ],
            //Italiano - Carne
            [
                'company_name' => 'Osteria dei Binari',
                'password' => 'binari',
                'email' => 'binari@email.it',
                'address' => 'Via Tortona, 1',
                'city' => 'Milano',
                'p_iva' => '98765432172',
                'img_path' => 'users-cover/binari.jpg',
                'type_id' => [1,11]
            ],
            //Cinese
            [
                'company_name' => 'Jubin Due',
                'password' => 'jubindue',
                'email' => 'jubindue@email.it',
                'address' => 'Via Padova, 7',
                'city' => 'Milano',
                'p_iva' => '98765432173',
                'img_path' => 'users-cover/jubin-due.jpg',
                'type_id' => 3
            ],
            //Greco
            [
                'company_name' => 'Callistos',
                'password' => 'callistos',
                'email' => 'callistos@email.it',
                'address' => 'Via Tofane, 5',
                'city' => 'Milano',
                'p_iva' => '98765432174',
                'img_path' => 'users-cover/callistos.jpg',
                'type_id' => 9
            ],
            //Giapponese
            [
                'company_name' => 'Sakura',
                'password' => 'sakura',
                'email' => 'sakura@email.it',
                'address' => 'Via Nicola Antonio Porpora, 59',
                'city' => 'Milano',
                'p_iva' => '98765432175',
                'img_path' => 'users-cover/sakura.jpg',
                'type_id' => 4
            ],
            //Pizza 
            [
                'company_name' => 'Da Zero',
                'password' => 'dazero',
                'email' => 'dazero@email.it',
                'address' => 'Via Luini, 9',
                'city' => 'Milano',
                'p_iva' => '98765432176',
                'img_path' => 'users-cover/dazero.jpg',
                'type_id' => [12]
            ],
//            [
//                'company_name' => 'Il Gatto E La Volpe',
//                'password' => 'gattovolpe',
//                'email' => 'gattovolpe@email.it',
//                'address' => 'Via Paulucci, 4',
//                'city' => 'Milano',
//                'p_iva' => '98765432164',
//                'img_path' => 'users-cover/ristorante-5.jpg',
//                'type_id' => 1
//            ],
//            [
//                'company_name' => 'Sapori del Salento',
//                'password' => 'saporisalento',
//                'email' => 'saporisalento@email.it',
//                'address' => 'Viale Fulvio Testi, 132',
//                'city' => 'cinisello Balsamo',
//                'p_iva' => '98765432165',
//                'img_path' => 'users-cover/ristorante-6.jpg',
//                'type_id' => 1
//            ],
//            [
//                'company_name' => 'Il Faro',
//                'password' => 'ilfaro',
//                'email' => 'ilfaro@email.it',
//                'address' => 'Via Emilio de Martino, 1',
//                'city' => 'Milano',
//                'p_iva' => '98765432166',
//                'img_path' => 'users-cover/ristorante-7.jpg',
//                'type_id' => 1
//            ],
//            [
//                'company_name' => 'Street Food Garage',
//                'password' => 'streetfood',
//                'email' => 'streetfood@email.it',
//                'address' => 'Largo Alfonso Lamarmora, 23',
//                'city' => 'sesto San Giovanni',
//                'p_iva' => '98765432167',
//                'img_path' => 'users-cover/ristorante-8.jpg',
//                'type_id' => 9
//            ],
//            [
//                'company_name' => 'La Pizza Giusta di Mimmo',
//                'password' => 'mimmopizza',
//                'email' => 'mimmopizza@email.it',
//                'address' => 'Viale Antonio Gramsci, 81',
//                'city' => 'Sesto San Giovanni',
//                'p_iva' => '98765432168',
//                'img_path' => 'users-cover/ristorante-9.jpg',
//                'type_id' => 12
//            ],
//            [
//                'company_name' => 'Fratelli la Bufala',
//                'password' => 'fratellibufala',
//                'email' => 'fratellibufala@email.it',
//                'address' => 'Viale Fulvio Testi, 49',
//                'city' => 'Cinisello Balsamo',
//                'p_iva' => '98765432169',
//                'img_path' => 'users-cover/ristorante-10.jpg',
//                'type_id' => 12
//            ],
//            [
//                'company_name' => 'La Basilicata',
//                'password' => 'labasilicata',
//                'email' => 'labasilicata@email.it',
//                'address' => 'Via Emilio de Marchi, 44',
//                'city' => 'Milano',
//                'p_iva' => '98765432170',
//                'img_path' => 'users-cover/ristorante-11.jpg',
//                'type_id' => 1
//            ],
//            // internazionale
//            [
//                'company_name' => 'Ristorante Pizzeria Gioia 53',
//                'password' => 'gioia53',
//                'email' => 'gioia53@email.it',
//                'address' => 'Via Melchiorre Gioia, 53',
//                'city' => 'Milano',
//                'p_iva' => '98765432171',
//                'img_path' => 'users-cover/ristorante-12.jpg',
//                'type_id' => 2
//            ],
//            [
//                'company_name' => 'Avo Brothers Isola',
//                'password' => 'avobrothers',
//                'email' => 'avobrothers@email.it',
//                'address' => 'Via Lambertenghi, 17',
//                'city' => 'Milano',
//                'p_iva' => '98765432172',
//                'img_path' => 'users-cover/avo-brothers.jpg',
//                'type_id' => 2
//            ],
//            // cinesi

//            [
//                'company_name' => 'Yuebinlou',
//                'password' => 'yuebinlou',
//                'email' => 'yuebinlou@email.it',
//                'address' => 'Via Paolo Sarpi, 42',
//                'city' => 'Milano',
//                'p_iva' => '98765432174',
//                'img_path' => 'users-cover/yuebinlou.jpg',
//                'type_id' => 3
//            ],

//            [
//                'company_name' => 'Mookuzai',
//                'password' => 'mookuzai',
//                'email' => 'mookuzai@email.it',
//                'address' => 'Via Arona, 18',
//                'city' => 'Milano',
//                'p_iva' => '98765432176',
//                'img_path' => 'users-cover/mookuzai.jpg',
//                'type_id' => 4
//            ],
//            // messicani
//            [
//                'company_name' => 'Piedra Del Sol',
//                'password' => 'piedradelsol',
//                'email' => 'piedradelsol@email.it',
//                'address' => 'Via Emilio Cornalia, 2',
//                'city' => 'Milano',
//                'p_iva' => '98765432177',
//                'img_path' => 'users-cover/piedra.jpg',
//                'type_id' => 5
//            ],
//            [
//                'company_name' => 'La Parrilla Mexicana',
//                'password' => 'parrilla',
//                'email' => 'parrilla@email.it',
//                'address' => 'Corso Sempione, 76',
//                'city' => 'Milano',
//                'p_iva' => '98765432178',
//                'img_path' => 'users-cover/parrilla.jpg',
//                'type_id' => 5
//            ],
//            // indiano
//            [
//                'company_name' => 'Tara Ristorante Indiano',
//                'password' => 'tara',
//                'email' => 'tara@email.it',
//                'address' => 'Via Domenico Cirillo, 16',
//                'city' => 'Milano',
//                'p_iva' => '98765432179',
//                'img_path' => 'users-cover/tara.jpg',
//                'type_id' => 6
//            ],

//            // vegetariano
//            [
//                'company_name' => 'Panghea',
//                'password' => 'panghea',
//                'email' => 'panghea@email.it',
//                'address' => 'Via Valenza, 5',
//                'city' => 'Milano',
//                'p_iva' => '98765432181',
//                'img_path' => 'users-cover/panghea.jpg',
//                'type_id' => 7
//            ],
//            [
//                'company_name' => 'Arcobaleno Vegetariano',
//                'password' => 'arcobaleno',
//                'email' => 'arcobaleno@email.it',
//                'address' => 'Via Carlo Maronchetti, 7',
//                'city' => 'Milano',
//                'p_iva' => '98765432182',
//                'img_path' => 'users-cover/arcobaleno.jpg',
//                'type_id' => 7
//            ],

//            [
//                'company_name' => 'Komenn Thai',
//                'password' => 'komenn',
//                'email' => 'komenn@email.it',
//                'address' => 'Via Lazzaro Papi, 5',
//                'city' => 'Milano',
//                'p_iva' => '98765432184',
//                'img_path' => 'users-cover/komenn.jpg',
//                'type_id' => 8
//            ],
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
            $user->types()->attach($restaurant['type_id']) ;
        }
    }
}
