<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 23:44:46
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\botonLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7f884ed9de03_31442505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffd8e4a364e85ff594b8ddd7d2b9a99399cb46b8' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\botonLogin.tpl',
      1 => 1602193302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7f884ed9de03_31442505 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section-consultas">
    
    <?php if ((!(isset($_SESSION['EMAIL'])))) {?>    <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->
        
            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <?php } else { ?>
            <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>

    <?php }?>
    <a class="botonConsultas" href="consultas"> Consultas</a>

</section><?php }
}
