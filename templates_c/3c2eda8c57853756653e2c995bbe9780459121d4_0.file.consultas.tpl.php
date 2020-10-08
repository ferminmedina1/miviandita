<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 03:14:02
  from 'C:\xampp\htdocs\TPE-WEB-II\templates\consultas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7e67dae70737_62054606',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c2eda8c57853756653e2c995bbe9780459121d4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-WEB-II\\templates\\consultas.tpl',
      1 => 1602112031,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f7e67dae70737_62054606 (Smarty_Internal_Template $_smarty_tpl) {
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
    <base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
</head>

<body>

 <!-- ENCABEZADO -->
    
    <?php $_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 <!-- MENU DE NAVEGACION -->

    <?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    
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

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
