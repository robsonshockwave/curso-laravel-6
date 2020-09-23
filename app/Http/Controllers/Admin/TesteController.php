<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    //criando um teste só pra mostrar que quer chegar aqui
    public function teste()
    {
        return 'Teste';
    }
}
