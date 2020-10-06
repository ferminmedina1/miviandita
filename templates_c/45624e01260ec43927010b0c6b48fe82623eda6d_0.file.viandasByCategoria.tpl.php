<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-04 03:15:32
  from 'D:\Program Files\XAMPP\htdocs\TPE-WEB-II\templates\viandasByCategoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f79223473ec27_95960025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45624e01260ec43927010b0c6b48fe82623eda6d' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\TPE-WEB-II\\templates\\viandasByCategoria.tpl',
      1 => 1601661431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f79223473ec27_95960025 (Smarty_Internal_Template $_smarty_tpl) {
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
    
    <header>

        <div class="encabezado">

            <div class="tituloYlogo">
                
                <a href="home"><img src="./images/LOGO2.png" alt="MiViandita!" class="logoEncabezado"></a>
            
                <h1 class="titulo"> Mi Viandita!</h1>

            </div>

            <input type="checkbox" id="btn-menu">
            <label for="btn-menu" class="icon-menu"><img src="./images/menu.png" class="imagenMenu"></label>
       
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

<footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="./Ilvero/Ilvero" class="ilvero"> Il Vero</a>
    </footer>

</body>
</html><?php }
}
