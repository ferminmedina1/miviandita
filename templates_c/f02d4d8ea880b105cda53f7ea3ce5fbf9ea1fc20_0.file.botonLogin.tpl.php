<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 03:13:54
  from 'C:\xampp\htdocs\TPE-WEB-II\templates\botonLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7e67d266df60_63922939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f02d4d8ea880b105cda53f7ea3ce5fbf9ea1fc20' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-WEB-II\\templates\\botonLogin.tpl',
      1 => 1602118898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7e67d266df60_63922939 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section-consultas">
    
    <?php if ((!(isset($_SESSION['EMAIL'])))) {?>    <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->
        
            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <?php } else { ?>
            <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>

    <?php }?>
    <a class="botonConsultas" href="consultas"> Consultas</a>

</section><?php }
}
