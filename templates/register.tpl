<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Log in</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/consultas.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-consultas.css">
    <link rel="stylesheet" href="./css/log.css">
    <script type="text/javascript" src="./js/nav.js"></script>
    <base href="{$base_url}">
</head>

<body>

 <!-- ENCABEZADO -->
    
    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

    {include file="nav.tpl"}
    
 <!-- FORMULARIO -->

    <article>

        <section class="contenedorform">

            <form class="formulario" action="agregarUser" method="post">

                <h1 class="subtitulo"> Registrate! <img src="./images/user.png" alt="user" id="userFormulario"></h1>
                
                <label class="itemformulario"> Correo: </label> <input type="email" id="correo" name="email">
                <label class="itemformulario"> Contraseña: </label> <input type="password" id="contra" name="pass">
                <label class="itemformulario"> Seleccione el rol </label>
                <select name="rol" id="select">
                    <option value="administrador">Administrador</option>
                    <option value="cliente">Cliente</option>
                </select>
                <a href="login" id="register">Ya tienes una cuenta? Logueate aca!</a>
                <p id="avisoCaptcha" class="mensajeIncorrecto">{$mensaje}</p>
                <button type="submit" id="botonEnviar" >REGISTRARSE</button>

            </form>

        </section>

    </article>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>