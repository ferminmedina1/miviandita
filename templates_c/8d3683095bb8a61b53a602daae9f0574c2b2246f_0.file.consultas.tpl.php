<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-30 21:08:48
  from 'D:\Program Files\XAMPP\htdocs\miviandita\templates\consultas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f74d7c0bc1030_85662377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d3683095bb8a61b53a602daae9f0574c2b2246f' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\miviandita\\templates\\consultas.tpl',
      1 => 1601487643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f74d7c0bc1030_85662377 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Consultas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/consultas.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-consultas.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/captcha.js"><?php echo '</script'; ?>
>
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

 <!-- PIE DE PAGINA -->

    <footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="ilvero" class="ilvero"> Il Vero</a>
    </footer>

</body>
</html><?php }
}
