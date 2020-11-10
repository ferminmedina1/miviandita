<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Viandas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/viandas.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-viandas.css">
    <script type="text/javascript" src="./js/nav.js"></script>
    <script type="text/javascript" src="./js/tabla.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <h2 class="tituloAllCategorias">TIPOS DE VIANDAS </h2>
    <div class="categoriasAll">
        {foreach from=$tipo item=categoria}
            <!--<a href= '{$categoria->tipo_vianda}' class="categoria">{$categoria->tipo_vianda}</a>-->
            <a href= 'categoria/{$categoria->tipo_vianda}' class="categoria"> {$categoria->tipo_vianda} </a>
        {/foreach}
             <a  href="verTodas" class="verTodas">Ver Todas</a>
    </div>



 <!-- BOTON LOGIN, CONSULTA Y ADMINISTRAR -->

    <section class="section-consultas">

        {if (!isset($smarty.session.user))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        
            {else}
                <h3 class="user">{$smarty.session.user}</h3> 
                <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        {/if}
        <a class="botonConsultas" href="consultas"> Consultas</a>

        {if (isset($smarty.session.ROL) && ($smarty.session.ROL == "administrador"))} <!--CON ESTO SE VERIFICA SI EL USUARIO ES ADMIN O NO-->
            <a class="botonAdministrar" href="administracion"> Administrar</a>
        {/if}
    </section>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>