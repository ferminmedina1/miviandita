<?php
/* Smarty version 3.1.34-dev-7, created on 2021-09-09 22:07:38
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\botonLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_613a698ab40014_40893553',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffd8e4a364e85ff594b8ddd7d2b9a99399cb46b8' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\botonLogin.tpl',
      1 => 1631218056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613a698ab40014_40893553 (Smarty_Internal_Template $_smarty_tpl) {
?>    <section class="section-consultas">

        <?php if ((!(isset($_SESSION['user'])))) {?> <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        
            <?php } else { ?>
                <h3 class="user"><?php echo $_SESSION['user'];?>
</h3> 
                <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <?php }?>
        <a class="botonConsultas" href="consultas"> Consultas</a>

        <?php if (((isset($_SESSION['ROL'])) && ($_SESSION['ROL'] == "administrador"))) {?> <!--CON ESTO SE VERIFICA SI EL USUARIO ES ADMIN O NO-->
            <a class="botonAdministrar" href="administracion"> Administrar</a>
        <?php }?>
    </section><?php }
}
