<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Contacto</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/contacto.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-contacto.css">
    <script type="text/javascript" src="./js/nav.js"></script>
    <base href="{$base_url}">
</head>

<body>

 <!-- ENCABEZADO -->
 
    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

            {if (!isset($smarty.session.ROL))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

             {include file="nav.tpl"}
        
            {else}
                {include file="navUser.tpl"}
        {/if}

 <!-- CUERPO DE LA PAGINA -->

    <article>

        <section class="contacto">

            <ul>
                <li> <img src="./images/whatsapp.png" alt="whatsapp Mi Vianadita!" class="iconWhatsapp"> <a href="https://www.whatsapp.com/" class="textoRedes"> 2494-682201</a> </li>
                <li> <img src="./images/facebook.png" alt="facebook Mi Vianadita!" class="iconFacebook"> <a href="https://www.facebook.com/ghersetti" class="textoRedes" id="facebook">Mi Viandita Virginia Ghersetti</a> </li>
                <li> <img src="./images/reloj.png" alt="horario Mi Vianadita!" class="iconHorario"> <a class="textoRedes"> De 6:00am a 11:00am </a> </li>
                <li> <img src="./images/instagram.png" alt="instagram Mi Vianadita!" class="iconInstagram"> <a href="https://www.instagram.com/miviandita/" class="textoRedes">@miviandita</a> </li>
            </ul>

        </section>

    </article>

 <!-- BOTON CONSULTAS & BOTON LOGIN-->

    {include file="botonLogin.tpl"}

 <!-- FOOTER -->

    {include file="footer.tpl"}
    
</body>
</html>