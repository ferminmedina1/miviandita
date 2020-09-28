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
    <script type="text/javascript" src="./js/captcha.js"></script>
</head>

<body>

 <!-- ENCABEZADO -->
    
    <header>

        <div class="encabezado">

            <div class="tituloYlogo">
                
                <a href="home"><img src="./images/LOGO2.png" alt="MiViandita!" class="logoEncabezado"></a>
            
                <h1 class="titulo"> Mi Viandita!</h1>

            </div>

            <input type="checkbox" id="btn-menu">
            <label for="btn-menu" class="icon-menu"><img src="./images/menu.png" class="imagenMenu"></label>
        
        </div>

    </header>

 <!-- MENU DE NAVEGACION -->

    <nav>

        <div class="menu">

            <a href="home" class="item">Home</a>
            <a href="viandas" class="item">Viandas</a>
            <a href="promociones" class="item">Promociones </a>
            <a href="contacto" class="item">Contacto</a>
            <a href="sobremiviandita" class="item">Sobre Mi Viandita</a>

        </div>

    </nav>
    
 <!-- FORMULARIO -->

    <article>

        <section class="contenedorform">

            <form class="formulario">

                <h1 class="subtitulo"> Registrate! <img src="./images/user.png" alt="user" id="userFormulario"></h1>
                
                <label class="itemformulario"> Nombre de usuario: </label> <input type="text" id="correo">
                <label class="itemformulario"> Correo: </label> <input type="email" id="correo">
                <label class="itemformulario"> Contraseña: </label> <input type="password" id="contra">
                <label class="itemformulario"> Repite la contraseña: </label> <input type="password" id="contra">
                <a href="login" id="register">Ya tienes una cuenta? Logueate aca!</a>
                <div class="contenedorCaptcha">
                    <label id="textocaptcha"></label> <input id="respuestaCaptcha" type="text" name="captcha" value="">
                </div>

                <p id="avisoCaptcha"></p>

                <button type="button" id="botonEnviar" >Enviar!</button>

            </form>

        </section>

    </article>

 <!-- PIE DE PAGINA -->

    <footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="ilvero" class="ilvero"> Il Vero</a>
    </footer>

</body>
</html>