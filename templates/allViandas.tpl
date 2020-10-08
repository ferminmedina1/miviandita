<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Todas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-allViandas.css">
    <script type="text/javascript" src="./js/detalleVianda.js"></script>
    <base href="{$base_url}">
</head>
<body>

    {include file="encabezado.tpl"}

    {if (!isset($smarty.session.EMAIL))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

            {include file="nav.tpl"}
        
            {else}
            {include file="navUser.tpl"}
    {/if}

    <h2 class="tituloAllViandas">TODAS LAS VIANDAS</h2>

    
    <div class="allViandas">
        
        {foreach from=$allViandas item=vianda}
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
    
<!-- BOTON CONSULTAS & BOTON LOGIN-->

    {include file="botonLogin.tpl"}

<!--FOOTER-->

    {include file="footer.tpl"}

</body>
</html>