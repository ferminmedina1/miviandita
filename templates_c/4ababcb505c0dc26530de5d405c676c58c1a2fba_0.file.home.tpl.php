<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-30 19:40:59
  from 'D:\Program Files\XAMPP\htdocs\miviandita\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f74c32bec3219_53570380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ababcb505c0dc26530de5d405c676c58c1a2fba' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\miviandita\\templates\\home.tpl',
      1 => 1601487643,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f74c32bec3219_53570380 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita!</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-home.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
>
</head>

<body>

 <!-- ENCABEZADO -->
 
    <header>

        <div class="encabezado">

            <div class="tituloYlogo">
                
                <img src="./images/LOGO2.png" alt="MiViandita!" class="logoEncabezado">
            
                <h1 class="titulo"> Mi Viandita!</h1>

            </div>

            <input type="checkbox" id="btn-menu">
            <label for="btn-menu" class="icon-menu"><img src="./images/menu.png" class="imagenMenu"></label>
        
        </div>
        
    </header>

 <!-- MENU DE NAVEGACION -->

    <nav>

        <div class="menu">
            <a href="#" class="itemPrincipal">Home</a>
            <a href="viandas" class="item">Viandas</a>
            <a href="promociones" class="item">Promociones </a>
            <a href="contacto" class="item">Contacto</a>
            <a href="sobremiviandita" class="item">Sobre Mi Viandita</a>
        </div>

    </nav>

 <!-- CUERPO DE LA PAGINA -->
    
    <article>

        <section class="imagenes">

            <ul class="listaFotos">
                <li><img src="./images/viandas-phone.jpg" class="imgInformacion"></li>
                <li><img src="./images/delivery.jpg" class="imgInformacion"></li>
                <li><img src="./images/chef.jpg" class="imgInformacion"></li>
                <li><img src="./images/municipio.jpg" class="imgInformacion"></li>
            </ul>

        </section>

        <section class="lista">

            <ul class="listaHome">
                <li>Planes de descenso de peso.</li>
                <li>Servicio de delivery.</li>
                <li>Chef profesional.</li>
                <li>Sala de elaboracion habilitada por bromatologia y municipio.</li>
            </ul>

        </section>

    </article>

 <!-- BOTON CONSULTAS -->

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
