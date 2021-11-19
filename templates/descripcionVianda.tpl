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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/comments.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <div class="imagenViandaContenedor">
        {if ($imagen != '')} 
            <img src="data:image/jpg; base64,{$imagen}" class="fotoComida">

            {if (isset($smarty.session.user) && $smarty.session.ROL == "administrador")} <!-- Si esta logueado y es administrador se ve el boton borran-->
                <a href= 'eliminarImagenVianda/{$vianda->id_vianda}'>
                <i class='botonBorrar material-icons' id='borrarImagenVianda{$vianda->id_vianda}' style='font-size:36px'>delete</i></a>
            {/if}
        {/if}
    </div>
    <div class="descripcionViandas">
        <p class="descripcion">{$vianda->descripcion}</p>
        <p class="categoria">Categoria:&nbsp;{$vianda->tipo_vianda}</p>
        <h3 class="precio">${$vianda->precio}</h3>
    </div>

    <div class="contenedorCalificacion">
        {if (isset($smarty.session.user))}

                {include file="calificacionDeVianda.tpl"}
        
        {/if}
        <div class= "error"></div>
        <div class="contenedorComentarios">

            <h3 class="tituloComentarios">Comentarios</h3>

            <div class="comentarios">
            {if (isset($smarty.session.user) && $smarty.session.ROL == "administrador")} <!-- Si esta logueado y es administrador se ve el boton borran-->
                <ul class="listaComentariosVIP">
                    
                </ul>

                {else}
                <ul class="listaComentarios">

                </ul>
            {/if}
            
            </div>

        </div>

    </div>
    
    <div class="contenedorVolver">
            <a href="viandas" class="volver" hr>Volver</a>
    </div>
<!-- BOTON CONSULTAS & BOTON LOGIN-->

    {include file="botonLogin.tpl"}

<!--FOOTER-->

    {include file="footer.tpl"}

</body>
</html>