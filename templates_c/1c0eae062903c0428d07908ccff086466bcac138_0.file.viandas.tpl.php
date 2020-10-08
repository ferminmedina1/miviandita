<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 03:13:56
  from 'C:\xampp\htdocs\TPE-WEB-II\templates\viandas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7e67d431dc00_55311932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c0eae062903c0428d07908ccff086466bcac138' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-WEB-II\\templates\\viandas.tpl',
      1 => 1602118963,
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
function content_5f7e67d431dc00_55311932 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Viandas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/viandas.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-viandas.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/tabla.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <h2 class="tituloAllCategorias">TIPOS DE VIANDAS </h2>
    <div class="categoriasAll">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipo']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
            <!--<a href= '<?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo_vianda;?>
' class="categoria"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo_vianda;?>
</a>-->
            <a href= 'categoria/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo_vianda;?>
' class="categoria"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo_vianda;?>
</a>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
             <a  href="verTodos" class="verTodas">Ver Todas</a>
    </div>



 <!-- BOTON LOGIN, CONSULTA Y ADMINISTRAR -->

    <section class="section-consultas">

        <?php if ((!(isset($_SESSION['EMAIL'])))) {?> <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        
            <?php } else { ?>
                <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <?php }?>
        <a class="botonConsultas" href="consultas"> Consultas</a>

        <?php if (((isset($_SESSION['ROL'])) && ($_SESSION['ROL'] == "administrador"))) {?> <!--CON ESTO SE VERIFICA SI EL USUARIO ES ADMIN O NO-->
            <a class="botonAdministrar" href="adminViandas"> Administrar Viandas</a>
        <?php }?>
    </section>

 <!-- FOOTER -->

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
