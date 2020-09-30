<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-30 21:09:29
  from 'D:\Program Files\XAMPP\htdocs\miviandita\templates\contacto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f74d7e9636395_39842502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1694f33d439eb6f592abf3b18940b394ea78f351' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\miviandita\\templates\\contacto.tpl',
      1 => 1601487643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f74d7e9636395_39842502 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Contacto</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/contacto.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-contacto.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
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
            <a href="promociones" class="item">Promociones</a>
            <a href="#" class="itemPrincipal">Contacto</a>
            <a href="sobremiviandita" class="item">Sobre Mi Viandita</a>
        </div>

    </nav>

 <!-- CUERPO DE LA PAGINA -->

    <article>

        <section class="contacto">

            <ul>
                <li> <img src="./images/whatsapp.png" alt="whatsapp Mi Vianadita!" class="iconWhatsapp"> <a href="https://www.whatsapp.com/" class="textoRedes"> 2494-682201</a> </li>
                <li> <img src="./images/facebook.png" alt="facebook Mi Vianadita!" class="iconFacebook"> <a href="https://www.facebook.com/ghersetti" class="textoRedes" id="facebook">Mi Viandita Virginia Ghersetti</a> </li>
                <li> <img src="./images/reloj.png" alt="horario Mi Vianadita!" class="iconHorario"> <a href="#" class="textoRedes"> De 6:00am a 11:00am </a> </li>
                <li> <img src="./images/instagram.png" alt="instagram Mi Vianadita!" class="iconInstagram"> <a href="https://www.instagram.com/miviandita/" class="textoRedes">@miviandita</a> </li>
            </ul>

        </section>

    </article>

 <!-- BOTON CONSULTAS & BOTON LOGIN-->

    <section class="section-consultas">
        <a class="botonLogueo" href="login"> Logueate <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonConsultas" href="consultas"> Consultas</a>
    </section>  

 <!-- PIE DE PAGINA -->

    <footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="ilvero" class="ilvero"> Il Vero</a>
    </footer>
    
</body>
</html><?php }
}
