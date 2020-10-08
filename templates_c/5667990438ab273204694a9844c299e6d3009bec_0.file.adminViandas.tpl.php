<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-09 00:00:50
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\adminViandas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7f8c12303594_35403794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5667990438ab273204694a9844c299e6d3009bec' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\adminViandas.tpl',
      1 => 1602194345,
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
function content_5f7f8c12303594_35403794 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/viandas.css">
    <link rel="stylesheet" href="./css/adminViandas.css">
    <link rel="stylesheet" href="./css/responsive/responsive.css">
    <link rel="stylesheet" href="./css/responsive/responsive-viandas.css">
    <?php echo '<script'; ?>
 type="text/javascript" src="./js/nav.js"><?php echo '</script'; ?>
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

    <h2 class="tituloAllCategorias">ADMINISTRAR VIANDAS</h2>

    <div class="agregarAtabla">

        <form action="agregarVianda" method="post">

            <div class="inputsPrincipales">
                <label class="textoInput"> Vianda: <input type="text" name="nombre" id="producto"> </label>
                <label class="textoInput"> Precio:  <input type="number" name="precio" id="precio"> </label>
                <label class="textoInput"> Descripción:  <textarea type="text" name="descripcion" id="descripcion"></textarea> </label>
                
            </div>

            
                <div class="tipoDeCategoria">

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
                    <button id="agregar_db" type="submit">Agregar Vianda</button>
                </div>

        </form>

    </div>

        <table>
            <thead>
                <tr>
                    <th>Viandas</th><th>Descripcion</th><th>Precio</th><th>Tipo</th><th>Borrar/Editar</th>
                </tr>
            </thead>
            <tbody id="viandasTable">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allViandas']->value, 'vianda');
$_smarty_tpl->tpl_vars['vianda']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vianda']->value) {
$_smarty_tpl->tpl_vars['vianda']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->nombre;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->descripcion;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->precio;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->tipo_vianda;?>
</td>
                    <td class="botonBorrar"> <a href='elimiarVianda/<?php echo $_smarty_tpl->tpl_vars['vianda']->value->id_vianda;?>
'><button class="botonBorrarTD" id="<?php echo $_smarty_tpl->tpl_vars['vianda']->value->id_vianda;?>
"><i class="fa fa-trash-o"></i></button></a>
                    <a href='editarVianda/<?php echo $_smarty_tpl->tpl_vars['vianda']->value->id_vianda;?>
' ><button class="botonEditarTD" id="<?php echo $_smarty_tpl->tpl_vars['vianda']->value->id_vianda;?>
"><i class="fa fa-edit"></i></button></a></td></tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>


    <div class="categorias">

            <form action="agregarCategoria" method="post">

                    <div class="categoriaNueva">
                    <h4>Administrar categorias</h4>
                        <div class="agregarCategoria">
                            <input type="text" name="tipo_vianda" id="nuevaCategoria" placeholder="Nueva categoria">
                            <button type="submit" id="addCategoria_db">Agregar categoria</button>
                        </div>
                    </div>
 

            </form>
    </div> 

            <table>
            <thead>
                <tr>
                    <th>Tipo de categoria</th><th>Borrar/Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipo']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo_vianda;?>
</td>
                    <td class="botonBorrar"> <a href='elimiarCategoria/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_dirigidoA;?>
'><button class="botonBorrarTD" id="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_dirigidoA;?>
"><i class="fa fa-trash-o"></i></button></a>
                    <a href='editarCategoria/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_dirigidoA;?>
'><button class="botonEditarTD" id="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_dirigidoA;?>
"><i class="fa fa-edit"></i></button></a></td></tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

 <!-- BOTON CONSULTAS Y LOGIN -->

    <section class="section-consultas">
        <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonAdministrar" href="viandas"> Volver a "viandas"</a>
    </section>

 <!-- FOOTER -->

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
