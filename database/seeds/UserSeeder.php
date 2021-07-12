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
        $user = new User();
        $user->email = 'io@email.it';
        $user->password = bcrypt('ciaociao');
        $user->company_name = 'Pinco';
        $user->address = 'Via delle vie';
        $user->p_iva = '12345678912';
        $user->type_id = 1;
        $user->save();
    }
}
