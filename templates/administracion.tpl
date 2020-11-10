<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/viandas.css">
    <link rel="stylesheet" href="./css/administracion.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-viandas.css">
    <script type="text/javascript" src="./js/nav.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <base href="{$base_url}">
</head>
<body>

    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

            {if (!isset($smarty.session.user))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

             {include file="nav.tpl"}
        
            {else}
                {include file="navUser.tpl"}
        {/if}


    <div class="administrar">
        
        <h2 class="tituloAdministracion">ADMINISTRACIÓN</h2>
        
        <a href="administracion/usuarios" class="usuarios">USUARIOS</a>

        <a href="administracion/viandas" class="viandas">VIANDAS</a>

        <a href='administracion/categorias' class="categorias"> CATEGORIAS </a>

    </div>

    <section class="section-consultas">
        <h3 class="user">{$smarty.session.user}</h3>
        <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonAdministrar" href="viandas"> Volver a viandas</a>
    </section>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>