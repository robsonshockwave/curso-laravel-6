<!-- A estrutura visual fica tudo aqui-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')EspecializaTi</title>
    

    <!--AULA Incluindo o Bootstrap no Laravel 6.x (via CDN)-->
    <!--esse link do bootstrap vai deixar com outra cara o projeto-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!--Aula Stacks Blade-->
    @stack('styles') <!--Estilos específicos em páginas específicas-->
    <!--vai colocar lá no index.blade.php-->
</head>
<body>
    <div class="container">
    <!--tudo que for comum em todas paginas do projeto ficará aqui dentro
    pra definir que será template faça igual abaixo-->
    @yield('content') <!--vantagem é que pode utilizar o template onde tiver a diretiva abaixo, e pode colocar vários conteúdos-->
    </div>

    <!--Aula Stacks Blade-->
    <!--Se quiser deixar o arquivo global, deixa aqui nosso template-->
    @stack('scripts') <!--Todos scripts de CSS que quiser incluir utiliza o stacks-->
</body>
</html>
