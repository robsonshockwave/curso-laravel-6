<!--Aula Includes, Components e Slots no Blade-->
<!--aqui centralizo todos os alertas do sistema-->

<div class="alert">
<p>Alert - {{ $content ?? ''}}</p>
</div> <!--pode passar um array pra cá com o conteúdo que quer que exiba, se passar array vazio dará erro, para isso coloque o ?? e 'qualquercoisa ou vazio'-->

<!--para incluir lá no index usa @ include-->