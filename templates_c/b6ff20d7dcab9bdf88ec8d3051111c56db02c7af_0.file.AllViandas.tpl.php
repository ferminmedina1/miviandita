<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 02:08:30
  from 'C:\xampp\htdocs\TPE-WEB-II\templates\AllViandas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7e587edf3366_65460925',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6ff20d7dcab9bdf88ec8d3051111c56db02c7af' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-WEB-II\\templates\\AllViandas.tpl',
      1 => 1602112089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:encabezado.tpl' => 1,
    'file:nav.tpl' => 1,
    'file:botonLogin.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f7e587edf3366_65460925 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Todas</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-allViandas.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/detalleVianda.js"><?php echo '</script'; ?>
>
    <base href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
</head>
<body>

    <?php $_smarty_tpl->_subTemplateRender("file:encabezado.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <h2 class="tituloAllViandas">TODAS LAS VIANDAS</h2>

    
    <div class="allViandas">
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allViandas']->value, 'vianda');
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
    
<!-- BOTON CONSULTAS & BOTON LOGIN-->

    <?php $_smarty_tpl->_subTemplateRender("file:botonLogin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--FOOTER-->

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
