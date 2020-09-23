<?php

//AULA Seeders no Laravel 6.x

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        /*comentei por causa da //AULA Factory
        User::create([ //são obrigados a colocar estes
            'name' => 'Robson Arruda',
            'email' => 'curso@gemeil.com',
            'password' => bcrypt('12345'),
        ]);*/
        //aqui vai aparecer App\Models e vc clica
        
        //AULA Factory
        //                   \/ a quantidade de usuários que quer criar
        factory(User::class, 10)->create();
        //dps disso vá ao terminal e digite:
        //php artisan db:seed --class=UsersTableSeeder
        //basicamente ele vai chamar o factory pra criar 10 vezes
        //se quiser saber as opções de criar factorys, digite no terminal: php artisan 

        //make:factory por exemplo, se tem uma tabela de produtos e quer inserir vários produtos nela, digite no terminal:
        //php artisan make:factory ProductFactory --model=Models\User
        //tem que ser no singular ----/\ sem o carai do S
    }
}
