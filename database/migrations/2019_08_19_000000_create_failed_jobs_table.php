<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}

//AULA  Migrations no Laravel 6.x

//acesse o terminal e digite php artisan migrate
//vai enviar tudo oq está na pasta migrations
/*
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="o nome do banco da dados criado lá em localhost:8084"
DB_USERNAME=root
DB_PASSWORD=root
*/

//a data ali é pra mostrar a ordem de criação das tebelas, primeiro de users, dps de passwords etc

//estrutura das tabelas, modifica a estrutura, define = up
//deletar as tabelas, altera/remove um relacionamento = down

//a sequência de criação de tabela é através do nome dos arquivos
//se um dia precisar alterar manualmente uma tabela, o nome do arquivo, eles são mapeáveis através do composer, então basta alterar o nome
//ir no terminal e digitar: composer dump-autoload   ..assim vai mapear novamente os arquivos

//pra criar um novo arquivo migrate basta acessar o terminal e digitar: 
/* php artisan
php artisan migrate



//o migrate:fresh deleta todas as tabelas e cria novamente
//o migrate:refresh deleta as tabelas passando sempre pelo método down, ai dps q deletou todas as tabelas ele volta e vem criando novamente
//o migrate::reset faz todo o rollback do database migrations, ou seja, deleta todas as tabelas, desfaz a ultima criação, tem como fazer de dois ou mais, basta configurar
//o migrate:status faz um verificação do status do migrations
//o migration:install cria um migration repository