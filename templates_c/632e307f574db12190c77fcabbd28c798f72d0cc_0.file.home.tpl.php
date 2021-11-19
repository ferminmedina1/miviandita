<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-09 22:05:32
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_613a690c654711_14375759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '632e307f574db12190c77fcabbd28c798f72d0cc' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\home.tpl',
      1 => 1631217907,
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
function content_613a690c654711_14375759 (Smarty_Internal_Template $_smarty_tpl) {
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
    <base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
</head>

<body>

 <!-- ENCABEZADO -->
 
    <?php $_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 <!-- MENU DE NAVEGACION -->

        <?php if ((!(isset($_SESSION['ROL'])))) {?> <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

             <?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
            <?php } else { ?>
                <?php $_smarty_tpl->_subTemplateRender("file:navUser.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>

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

 <!-- BOTON CONSULTAS Y LOGIN -->

    <?php $_smarty_tpl->_subTemplateRender("file:botonLogin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 <!-- FOOTER -->

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
