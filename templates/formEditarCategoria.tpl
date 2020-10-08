<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion - Editar Categoria</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/consultas.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-consultas.css">
    <script type="text/javascript" src="../js/nav.js"></script>
    <base href="{$base_url}">
</head>

<body>

 <!-- ENCABEZADO -->
    
    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

    {include file="nav.tpl"}


 <!-- FORMULARIO -->

    <article>

        <section class="contenedorform">

            {foreach from=$tipo item=tipoAnterior}                
            <form class="formulario" method="post" action="actualizarCategoria/{$tipoAnterior->id_dirigidoA}">
                <h1 class="subtitulo"> EDITA LA CATEGORIA:  {$tipoAnterior->tipo_vianda}</h1>
                <label class="itemformulario"> Nombre: </label> <input type="text" name="nombre" placeholder="Anteriormente era: {$tipoAnterior->tipo_vianda}">
            {/foreach}

                <button type="submit" id="botonEnviar">Actualizar!</button>

            </form>

        </section>

    </article>


 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>