<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-09 01:47:37
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\viandasByCategoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7fa5199ad202_23153203',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45624e01260ec43927010b0c6b48fe82623eda6d' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\viandasByCategoria.tpl',
      1 => 1602194248,
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
function content_5f7fa5199ad202_23153203 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - <?php echo $_smarty_tpl->tpl_vars['titulo_tipo']->value;?>
 </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-viandaByCategory.css">
    <base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/detalleVianda.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <h2 class="tituloAllViandas">TIPO DE VIANDA: <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['titulo_tipo']->value, 'UTF-8');?>
</h2>

    
    <div class="allViandas">
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['viand']->value, 'vianda');
$_smarty_tpl->tpl_vars['vianda']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vianda']->value) {
$_smarty_tpl->tpl_vars['vianda']->do_else = false;
?>
            <div class="contenedorVianda">

                    <button class="plato"><?php echo $_smarty_tpl->tpl_vars['vianda']->value->nombre;?>
</button>

                    <div class="oculto">
                        <div class="descripcionViandas">
                            <p><?php echo $_smarty_tpl->tpl_vars['vianda']->value->descripcion;?>
</p>
                            <h3 class="precio">$<?php echo $_smarty_tpl->tpl_vars['vianda']->value->precio;?>
</h3>
                        </div>
                    </div>
                </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
             
    </div>
    <div class="contenedorVolver">
            <a href="viandas" class="volver" hr>Volver</a>
    </div>
   
<!--BOTON LOGIN Y CONSULTAS-->

    <?php $_smarty_tpl->_subTemplateRender("file:botonLogin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--FOOTER-->

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
