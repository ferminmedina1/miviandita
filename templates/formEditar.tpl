<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion - Editar</title>
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

            {if (!isset($smarty.session.user))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

             {include file="nav.tpl"}
        
            {else}
                {include file="navUser.tpl"}
        {/if}


 <!-- FORMULARIO -->

    <article>

        <section class="contenedorform">

            
            <form class="formulario" method="post" action="actualizarVianda/{$vianda->id_vianda}">
                <h1 class="subtitulo"> EDITA LA VIANDA:  {$vianda->nombre}</h1>
                <label class="itemformulario"> Nombre: </label> <input type="text" name="nombre" value={$vianda->nombre}>
                <label class="itemformulario"> Precio: </label> <input type="number" name="precio"  value={$vianda->precio}>
                <label class="itemformulario"> Tipo de vianda: (Anteriormente era: {$vianda->tipo_vianda})</label> 
                    <select name="dirigidoA" id="select">
                        {foreach from=$tipo item=categoria}
                            <option value="{$categoria->id_dirigidoA}">{$categoria->tipo_vianda}</option>
                        {/foreach}
                    </select>
                <label class="itemformulario"> Nueva descripcion: </label> <textarea type="text" name="descripcion">{$vianda->descripcion}</textarea>
                

                <button type="submit" id="botonEnviar">Actualizar!</button>

            </form>

        </section>

    </article>

        <section class="section-consultas">
            <a class="botonAdministrar" href="administracion/viandas"> Volver a administrar</a>
        </section>
 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>