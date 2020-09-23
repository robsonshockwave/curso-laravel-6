<!-- Components e Slots -->

<div class="card">
    <div class="card-header">
        {{ $title }}
    </div>
    <div class = "card-boy">
        <!--vai receber o conteúdo dinamicamente, por isso componentes e slots, simplesmente utiliza
        um componente e passa o valor, na qual já injetará o valor no componente $slot -->
        {{ $slot }}
        <!--vai ter o component lá no index.blade.php -->
    </div>
</div>