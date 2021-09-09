<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Sobre nosotros</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/sobre.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-sobre.css">
    <script type="text/javascript" src="./js/nav.js"></script>
    <base href="{$base_url}">
</head>

<body class="contacto">

 <!-- ENCABEZADO -->

    {include file="encabezado.tpl"}

 <!-- MENU -->

            {if (!isset($smarty.session.ROL))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

             {include file="nav.tpl"}
        
            {else}
                {include file="navUser.tpl"}
        {/if}

 <!-- CUERPO DE PAGINA -->

    <article>
        <section class="descripcion">

            <div class="contenedor-imagen">
                <img src="./images/LOGO.png" alt="Mi viandita" class="logo">
            </div>

            <p class="informacion">Mi viandita es un emprendimiento realizado por la chef profesional  Virginia Ghersetti, comenzado en 2013 y con toda una trayectoria enfocada
                a las viandas light. Contamos con una sala de elaboracion hablitada y con un plan de descenso de peso. Dentro de la pagina se tiene toda la
                información requerida para contactar a Mi Viandita por cualquiera de sus redes. Contamos con envios a toda la ciudad de Tandil. Y Este 2020
                estamos mas renovados que nunca con esta pagina web realizada por Agustin Arleo y Fermin Medina. Cualquier consulta que tengan pueden realizarla
                presionando el boton de "consultas".
            </p>

        </section>
    
    </article>

 <!-- BOTON CONSULTAS Y LOGIN -->

    {include file="botonLogin.tpl"}
    
 <!-- FOOTER -->

    {include file="footer.tpl"}
    
</body>
</html>