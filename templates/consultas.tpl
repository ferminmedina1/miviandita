<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Consultas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/consultas.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-consultas.css">
    <script type="text/javascript" src="./js/nav.js"></script>
    <script type="text/javascript" src="./js/captcha.js"></script>
    <base href="{$base_url}">
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
    
 <!-- FORMULARIO -->

    <article>

        <section class="contenedorform">

            <form class="formulario">

                <h1 class="subtitulo"> Consultas <img src="./images/user.png" alt="user" id="userFormulario"></h1>
                
                <label class="itemformulario"> Nombre: </label> <input type="text" id="nombre">
                <label class="itemformulario"> Apellido: </label> <input type="text" id="apellido">
                <label class="itemformulario"> Correo: </label> <input type="email" id="correo">
                <label class="itemformulario"> Tu consulta: </label> <textarea type="text" id="consulta"></textarea>

                <div class="contenedorCaptcha">
                    <label id="textocaptcha"></label> <input id="respuestaCaptcha" type="text" name="captcha" value="">
                </div>

                <p id="avisoCaptcha"></p>

                <button type="button" id="botonEnviar" >Enviar!</button>

            </form>

        </section>

    </article>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>