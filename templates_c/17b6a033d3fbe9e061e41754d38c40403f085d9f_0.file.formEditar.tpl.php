<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 03:26:55
  from 'C:\xampp\htdocs\TPE-WEB-II\templates\formEditar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7e6adfc54bd4_66682739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17b6a033d3fbe9e061e41754d38c40403f085d9f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE-WEB-II\\templates\\formEditar.tpl',
      1 => 1602120413,
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
function content_5f7e6adfc54bd4_66682739 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion - Editar</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/consultas.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-consultas.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="../js/nav.js"><?php echo '</script'; ?>
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

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vianda']->value, 'viandaAnterior');
$_smarty_tpl->tpl_vars['viandaAnterior']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['viandaAnterior']->value) {
$_smarty_tpl->tpl_vars['viandaAnterior']->do_else = false;
?>
            <form class="formulario" method="post" action="actualizarVianda/<?php echo $_smarty_tpl->tpl_vars['viandaAnterior']->value->id_vianda;?>
">
                <h1 class="subtitulo"> EDITA LA VIANDA:  <?php echo $_smarty_tpl->tpl_vars['viandaAnterior']->value->nombre;?>
</h1>
                <label class="itemformulario"> Nombre: </label> <input type="text" name="nombre" placeholder="Anteriormente era: <?php echo $_smarty_tpl->tpl_vars['viandaAnterior']->value->nombre;?>
">
                <label class="itemformulario"> Precio: </label> <input type="number" name="precio"  placeholder="Anteriormente era: <?php echo $_smarty_tpl->tpl_vars['viandaAnterior']->value->precio;?>
">
                <label class="itemformulario"> Tipo de vianda: (Anteriormente era: <?php echo $_smarty_tpl->tpl_vars['viandaAnterior']->value->tipo_vianda;?>
)</label> 
                    <select name="dirigidoA" id="select">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipo']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_dirigidoA;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo_vianda;?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                <label class="itemformulario"> Nueva descripcion: </label> <textarea type="text" name="descripcion" ></textarea>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <button type="submit" id="botonEnviar">Actualizar!</button>

            </form>

        </section>

    </article>


 <!-- FOOTER -->

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
