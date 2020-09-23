<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha View</title>
</head>
<body>
    <!--Conteúdo do Projeto, site ou coisas afins-->
    <!--o @ siginifica que é uma diretiva, tem pra autentificação, estrutura de controle, repetição etc
    se tive <?php ?> está errado, não pode conter lógica dentro do view
    Para fazer a impressão quando utiliza uma variável no controller é assim-->
    <!--{ {$teste}}-->
    
    <!--Impressões no Blade Laravel { { vs {! ! 
    Quando tem alguns casos, como por exemplo, um blog e lá tem texto que utilizou algum editor, que tem tegs, formato em negrito
    e precisa fazer um impressão diferente, do jeito que realmente é-->
    <!-- { {$teste}}  vai imprimir o conteúdo como realmente ele tá lá, com <h1></h1>, é um método de segurança para que não haja ataques
    para que não imprima o conteúdo e não o código e você tenha certeza que ele é seguro, faça assim-->
        {!! $teste !!}
    
</body>
</html>