<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - {$titulo_tipo} </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-viandaByCategory.css">
    <base href="{$base_url}">
    <script type="text/javascript" src="./js/nav.js"></script>
    <script type="text/javascript" src="./js/detalleVianda.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- ENCABEZADO -->
    
    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

            {if (!isset($smarty.session.EMAIL))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

             {include file="nav.tpl"}
        
            {else}
                {include file="navUser.tpl"}
        {/if}

        <h2 class="tituloAllViandas">TIPO DE VIANDA: {$titulo_tipo|upper}</h2>

    
    <div class="allViandas">
        
        {foreach from=$viand item=vianda}
            <div class="contenedorVianda">

                    <button class="plato">{$vianda->nombre}</button>

                    <div class="oculto">
                        <div class="descripcionViandas">
                            <p>{$vianda->descripcion}</p>
                            <h3 class="precio">${$vianda->precio}</h3>
                        </div>
                    </div>
                </div>
        {/foreach}
             
    </div>
    <div class="contenedorVolver">
            <a href="viandas" class="volver" hr>Volver</a>
    </div>
   
<!--BOTON LOGIN Y CONSULTAS-->

    {include file="botonLogin.tpl"}

<!--FOOTER-->

    {include file="footer.tpl"}

</body>
</html>