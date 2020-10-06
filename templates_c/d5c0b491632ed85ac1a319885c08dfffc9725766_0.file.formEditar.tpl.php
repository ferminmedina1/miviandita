<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-04 21:12:38
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\formEditar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7a1ea6b27883_25534780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5c0b491632ed85ac1a319885c08dfffc9725766' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\formEditar.tpl',
      1 => 1601774559,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7a1ea6b27883_25534780 (Smarty_Internal_Template $_smarty_tpl) {
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
    
    <header>

        <div class="encabezado">

            <div class="tituloYlogo">
                
                <a href="home"><img src="../Images/LOGO2.png" alt="MiViandita!" class="logoEncabezado"></a>
            
                <h1 class="titulo"> Mi Viandita!</h1>

            </div>

            <input type="checkbox" id="btn-menu">
            <label for="btn-menu" class="icon-menu"><img src="../Images/menu.png" class="imagenMenu"></label>
       
        </div>
        
    </header>

 <!-- MENU DE NAVEGACION -->

    <nav>

        <div class="menu">
            <a href="home" class="item">Home</a>
            <a href="viandas" class="itemPrincipal">Viandas</a>
            <a href="promociones" class="item">Promociones </a>
            <a href="contacto" class="item">Contacto</a>
            <a href="sobremiviandita" class="item">Sobre Mi Viandita</a>
        </div>

    </nav>


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
                <label class="itemformulario"> Nueva descripcion: </label> <textarea type="text" name="descripcion" placeholder="Anteriormente era: <?php echo $_smarty_tpl->tpl_vars['viandaAnterior']->value->descripcion;?>
"></textarea>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <button type="submit" id="botonEnviar">Actualizar!</button>

            </form>

        </section>

    </article>


 <!-- PIE DE PAGINA -->

    <footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="ilvero" class="ilvero"> Il Vero</a>
    </footer>

</body>
</html><?php }
}
