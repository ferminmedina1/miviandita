<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 23:59:09
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\contacto.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7f8bada90515_34508157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8ef8c74a69dd56b17b8cc39c7b23974538599bd' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\contacto.tpl',
      1 => 1602194307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:navUser.tpl' => 1,
    'file:botonLogin.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f7f8bada90515_34508157 (Smarty_Internal_Template $_smarty_tpl) {
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
    <base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
</head>

<body>

 <!-- ENCABEZADO -->
 
    <?php $_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 <!-- MENU DE NAVEGACION -->

            <?php if ((!(isset($_SESSION['EMAIL'])))) {?> <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

             <?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
            <?php } else { ?>
                <?php $_smarty_tpl->_subTemplateRender("file:navUser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>

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

    <?php $_smarty_tpl->_subTemplateRender("file:botonLogin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 <!-- FOOTER -->

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
</body>
</html><?php }
}
