<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - {$vianda->nombre}</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/descripcionVianda.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@1,500&display=swap" rel="stylesheet">
    <script src="../js/comments.js"></script>
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
    
    <div class="contenedorVianda">
        

    <h2  class="plato">{$vianda->nombre}</h2>

    <div class="descripcionViandas">
        <p class="descripcion">{$vianda->descripcion}</p>
        <p class="categoria">Categoria:&nbsp;{$vianda->tipo_vianda}</p>
        <h3 class="precio">${$vianda->precio}</h3>
    </div>


    </div>


    
        {if (isset($smarty.session.user))}

                {include file="calificacionDeVianda.tpl"}
        
        {/if}

        <div class="contenedorComentarios">

            <h3 class="tituloComentarios">Comentarios</h3>

            <div class="comentarios">
                
                <ul class="listaComentarios">

                </ul>
            </div>

        </div>


    <div class="contenedorVolver">
            <a href="verTodas" class="volver" hr>Volver</a>
    </div>
    
<!-- BOTON CONSULTAS & BOTON LOGIN-->

    {include file="botonLogin.tpl"}

<!--FOOTER-->

    {include file="footer.tpl"}

</body>
</html>