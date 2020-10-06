<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-05 00:20:29
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\log.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7a4aad5a16f2_44623901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c72604a29f92d4bbf09de30d06fb373d7daa865' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\log.tpl',
      1 => 1601850022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7a4aad5a16f2_44623901 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/captcha.js"><?php echo '</script'; ?>
>
    <base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
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

            <form class="formulario" action="verifyUser" method="post">

                <h1 class="subtitulo"> Logueate! <img src="./images/user.png" alt="user" id="userFormulario"></h1>
                
                <label class="itemformulario"> Email: </label> <input type="text" name="input_user">
                <label class="itemformulario"> Contraseña: </label> <input type="password" id="contra" name="input_pass">
                <a href="register" id="register">No tienes una cuenta? Crea una haciendo click aca!</a>
                <p id="avisoCaptcha"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</p>
                <button type="submit" id="botonEnviar" >Enviar!</button>

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
</html><?php }
}
