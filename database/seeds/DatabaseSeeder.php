<?php

//AULA Seeders no Laravel 6.x
/*Acabou de criar a aplicação, subiu ele pra produção e pra acessar o ambiente tem área restrita e
a única forma de acessar é com usuário e senha, nesse caso, precisa criar um usuário no banco de dados
pra ter acesso, poderia tbm acessar a tabela de banco de dados na produção e criar os dados manualmente,
mas no caso do usuário do laravel tem uma hash que utiliza para criptografar a senha, então n consegue decriptografar a
senha.. nessa caso a opção seria criar um arquivo de seeder e ele poderia já criar um usuário default no banco de dados,
configurar um usuário padrão, para isso faça oq eu fiz aí na prática.*/


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);//poderia passar um array com vários seeders ou a chamada de vários seeders
    }
}
//AULA Seeders no Laravel 6.x - 1
//criei UserTableSeeder, mas poderia ser ProductUserTableSeeder, CategoriesUserTableSeeder etc
//digita no terminal
// php artisan make:seeder UsersTableSeeder
//se criasse manualmente teria que mapear usando composer dump autoload

//AULA Seeders no Laravel 6.x - 2
//vai no terminal e digita:
//php artisan db:seed
//daí já vai rodar o database seeder
//como já foi inserida, se fizer dnv vai gerar um erro
/*pra resolver, POR EXEMPLO, SE CRIOU OUTRO SEEDER E QUER INSERIR O REGISTRO EM OUTRA TABELA, PORÉM NÃO QUER QUER RODE ESSE
NOVAMENTE, FAÇA NO TERMINAL 
php artisan db:seed --class=ProductsTableSeeder
SÓ IRÁ RODAR AQUELE SEEDER ACIMA*/
