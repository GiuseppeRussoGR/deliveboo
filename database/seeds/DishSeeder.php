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
                'name' => 'Gindara',
                'description' => 'Merluzzo nero dell’Alaska marinato in salsa al miso',
                'price' => 24.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/gindara.jpg',
                'user_id' => 1,
                'type_id' => 10
            ],
            [
                'name' => 'Maguro Tataki',
                'description' => 'Tonno scottato con verdure di stagione',
                'price' => 20.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/maguro.jpg',
                'user_id' => 1,
                'type_id' => 10
            ],
            [
                'name' => 'Tori No Karaage',
                'description' => 'Bocconcini di pollo fritto con salsa agrodolce e tartara speciale',
                'price' => 16.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/tori.jpg',
                'user_id' => 1,
                'type_id' => 11
            ],
            [
                'name' => 'Wagyu Beef',
                'description' => 'Entrecote di carne di Wagyu (100g) servito con wok di verdure e chips di manioca',
                'price' => 30.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/wagyu.jpg',
                'user_id' => 1,
                'type_id' => 11
            ],
            [
                'name' => 'Maccheroni Montalcino',
                'description' => 'Dalla storica ricetta di Nonna Mara, nasce il Ragù Montalcino, da sempre servito con successo insieme ai maccheroni nel nostro Ristorante Ribot.',
                'price' => 12.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/maccheroni-montalcino.jpg',
                'user_id' => 2,
                'type_id' => 1
            ],
            [
                'name' => 'Risotto alla Milanese',
                'description' => 'Riso, cipolla, vino bianco, brodo di carne, zafferano, burro e parmigiano',
                'price' => 12.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/risotto.jpg',
                'user_id' => 2,
                'type_id' => 1
            ],
            [
                'name' => 'Il Misto Crudo',
                'description' => 'Tartarina di manzo, Tartarina di fassona piemontese Tartarina di toro Carpaccio di fassona piemontese con rucola e grana',
                'price' => 24.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/il-misto.jpg',
                'user_id' => 2,
                'type_id' => 11
            ],
            [
                'name' => 'Tartare di Fassona Piemontese',
                'description' => 'Tartare 100% Fassona Piemontese.',
                'price' => 20.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/tartare-di-fassona.jpg',
                'user_id' => 2,
                'type_id' => 11
            ],
            [
                'name' => 'Sushi Misto',
                'description' => 'Sushi Misto',
                'price' => 23.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/sushi-misto.jpg',
                'user_id' => 3,
                'type_id' => 4
            ],
            [
                'name' => 'Sushi Misto',
                'description' => 'Sushi Misto',
                'price' => 23.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/sushi-misto.jpg',
                'user_id' => 3,
                'type_id' => 4
            ],
            [
                'name' => 'Sushi Salmone e Tonno',
                'description' => 'Sushi Salmone e Tonno',
                'price' => 19.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/tonno-e-salmone.jpg',
                'user_id' => 3,
                'type_id' => 4
            ],
            [
                'name' => 'Carpaccio Manzo Angus Irlandese',
                'description' => 'Carpaccio Manzo Angus Irlandese',
                'price' => 18.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/carpaccio-black-angus.jpg',
                'user_id' => 3,
                'type_id' => 11
            ],
            [
                'name' => 'Tacos - Guacamole e verdure',
                'description' => 'Guacamole, verdure di stagione e coriandolo. 3 Pezzi',
                'price' => 10.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/tacos_guacamole_verdure.jpg',
                'user_id' => 4,
                'type_id' => 5
            ],
            [
                'name' => 'Pollo Peruviano',
                'description' => 'Sovraccoscia di pollo ruspante alla griglia con lime, cancha e salsa jalapeno',
                'price' => 18.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/main_pollo.jpg',
                'user_id' => 4,
                'type_id' => 2
            ],
            [
                'name' => 'Gyoza - Anatra',
                'description' => 'Gyoza - Anatra',
                'price' => 10.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/gyoza.jpg',
                'user_id' => 4,
                'type_id' => 4
            ],
            [
                'name' => 'Spaghetti di soia con frutti di mare alla piastra',
                'description' => 'Leggermente piccanti',
                'price' => 8.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/spaghetti-soia-frutti-mare.jpg',
                'user_id' => 5,
                'type_id' => 4
            ],
            [
                'name' => 'Anatra alla Singapore',
                'description' => 'Accompagnata da crepes, verdurine e salsa alle prugne',
                'price' => 11.20,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/anatra-alla-singapore.jpg',
                'user_id' => 5,
                'type_id' => 3
            ],
            [
                'name' => 'Manzo al curry',
                'description' => 'Manzo al curry',
                'price' => 7.60,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/manzo-al-curry.jpg',
                'user_id' => 5,
                'type_id' => 3
            ],
            [
                'name' => 'Chitarra alla carbonara',
                'description' => 'Con guanciale croccante IGP, e pecorino sardo DOP',
                'price' => 10.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/chitarra-carbonara.jpg',
                'user_id' => 6,
                'type_id' => 1
            ],
            [
                'name' => 'L\'Americana - Normale',
                'description' => 'Pomodoro, mozzarella, polpette della nonna, grana, basilico',
                'price' => 9.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/pizza-polpette-basilico.jpg',
                'user_id' => 6,
                'type_id' => 12
            ],
            [
                'name' => 'La Partenopea - Normale',
                'description' => 'Pomodoro, mozzarella, salsiccia punta di coltello, scamorza affumicata, friarielli alla napoletana',
                'price' => 9.00,
                'visibility' => 1,
                'category_id' => 4,
                'img_path' => 'dishes-cover/pizza-salsicce-e-friarielli.jpg',
                'user_id' => 6,
                'type_id' => 12
            ],
            [
                'name' => 'Patate al forno',
                'description' => 'Patate al forno',
                'price' => 5.00,
                'visibility' => 1,
                'category_id' => 2,
                'img_path' => 'dishes-cover/patate-al-forno1.jpg',
                'user_id' => 7,
                'type_id' => 7
            ],
            [
                'name' => 'Verdure al vapore',
                'description' => 'Verdure al vapore',
                'price' => 5.00,
                'visibility' => 1,
                'category_id' => 2,
                'img_path' => 'dishes-cover/verdure-vapore.jpg',
                'user_id' => 7,
                'type_id' => 7
            ],
            [
                'name' => 'Peperoni saltati con origano, olive e capperi',
                'description' => 'Peperoni saltati con origano, olive e capperi',
                'price' => 6.50,
                'visibility' => 1,
                'category_id' => 2,
                'img_path' => 'dishes-cover/peperoni-origano-capperi.jpg',
                'user_id' => 7,
                'type_id' => 7
            ],
            [
                'name' => 'TAJ BIRYANI',
                'description' => 'Risotto con carne d\'agnello, uvetta, mandorle e zafferano',
                'price' => 9.50,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/taj-biry.jpg',
                'user_id' => 8,
                'type_id' => 6
            ],
            [
                'name' => 'JHENGA BIRYANI',
                'description' => 'Risotto con code di gamberi e mandorle',
                'price' => 9.50,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/jhenga.jpg',
                'user_id' => 8,
                'type_id' => 6
            ],
            [
                'name' => 'RING PAKORA',
                'description' => 'Anelli di cipolla fritti pastellati con farina di ceci',
                'price' => 8.50,
                'visibility' => 1,
                'category_id' => 1,
                'img_path' => 'dishes-cover/ring-pakora.jpg',
                'user_id' => 8,
                'type_id' => 6
            ],

            [
                'name' => 'KHANG KRAI',
                'description' => 'Pollo al curry giallo con latte di cocco e riso',
                'price' => 12.00,
                'visibility' => 1,
                'category_id' => 3,
                'img_path' => 'dishes-cover/khang-krai.jpg',
                'user_id' => 12,
                'type_id' => 8
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
            $new_dish->type_id = $dish['type_id'];
            $new_dish->save();
        }
    }
}
