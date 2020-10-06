<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-05 00:27:34
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\sobre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7a4c56d7b999_21042977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49c9accba4714a870af6c0404145311b1ef58298' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\sobre.tpl',
      1 => 1601850090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7a4c56d7b999_21042977 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Sobre nosotros</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/sobre.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-sobre.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
>
    <base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
</head>

<body class="contacto">

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

 <!-- MENU -->

    <nav>

        <div class="menu">

            <a href="home" class="item">Home</a>
            <a href="viandas" class="item">Viandas</a>
            <a href="promociones" class="item">Promociones </a>
            <a href="contacto" class="item">Contacto</a>
            <a href="sobre" class="itemPrincipal">Sobre Mi Viandita</a>

        </div>

    </nav>

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
