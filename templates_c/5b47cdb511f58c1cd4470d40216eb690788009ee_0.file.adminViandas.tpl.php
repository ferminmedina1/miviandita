<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 19:35:02
  from 'D:\Program Files\XAMPP\htdocs\miviandita\templates\adminViandas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7613466f8858_12686795',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b47cdb511f58c1cd4470d40216eb690788009ee' => 
    array (
      0 => 'D:\\Program Files\\XAMPP\\htdocs\\miviandita\\templates\\adminViandas.tpl',
      1 => 1601573666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7613466f8858_12686795 (Smarty_Internal_Template $_smarty_tpl) {
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
 <!--   <?php echo '<script'; ?>
 type="text/javascript" src="./js/tabla.js"><?php echo '</script'; ?>
> -->
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

    <h2 class="tituloAllCategorias">ADMINISTRAR VIANDAS</h2>

    <div class="agregarAtabla">

        <form action="agregarVianda" method="post">

            <div class="inputsPrincipales">
                <label class="textoInput"> Vianda: <input type="text" name="nombre" id="producto"> </label>
                <label class="textoInput"> Descripción:  <input type="text" name="descripcion" id="precio"> </label>
                <label class="textoInput"> Precio:  <input type="number" name="precio" id="precio"> </label>
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

        <div class="categorias">

            <form action="agregarCategoria" method="post">

                    <div class="categoriaNueva">
                    <h5>Administrar categorias</h5>
                        <input type="text" name="tipo_vianda" id="nuevaCategoria" placeholder="Nueva categoria">
                        <button type="submit" id="addCategoria_db">Agregar categoria</button>
                    </div>
 

            </form>

        </div> 
                
        <table>
            <thead>
                <tr>
                    <th>Categoria</th><th>Borrar/Editar</th>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipo']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->tipo_vianda;?>
</td><td class="botonBorrar"> <button class="botonBorrarTD" id="' + nuevoID+ '"> <i class="fa fa-trash-o"></i></button> <button class="botonEditarTD" id="' + nuevoID+ '"><i class="fa fa-edit"></i></button></td></tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>Viandas</th><th>Descripcion</th><th>Precio</th><th>Dirigido a</th><th>Borrar/Editar</th>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allViandas']->value, 'vianda');
$_smarty_tpl->tpl_vars['vianda']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['vianda']->value) {
$_smarty_tpl->tpl_vars['vianda']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->nombre;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->descripcion;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->precio;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['vianda']->value->id_dirigidoA;?>
</td><td class="botonBorrar"> <button class="botonBorrarTD" id="' + nuevoID+ '"> <i class="fa fa-trash-o"></i></button> <button class="botonEditarTD" id="' + nuevoID+ '"><i class="fa fa-edit"></i></button></td></tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>


 <!-- CUERPO DE PAGINA -->
  <!--
    <article>
     
       

        <section class="contenedorVianda">

            <img src="./images/milanesa.jpg" alt="Milanesa" class="fotoComida">

            <div class="plato">
                <h2 class="subtitulo"> La gran milanesa:</h2>
            </div>

            <div class="descripcionViandas">
                <p>Te presentamos la "gran milanesa", hecha con ingredientes de primera calidad. Este combo
                    viene con una porcion de papas y una milanesa de carne para una persona, ideal para un buen almuerzo.
                </p>
            </div>

            <h2 class="precio">$150</h2>

        </section>

        

        <section class="contenedorVianda">

            <img src="./images/vianda vegana.jpg" alt="vianda vegana" class="fotoComida">

            <div class="plato">
                <h2 class="subtitulo"> Vianda vegetariana:</h2>
            </div>

            <div class="descripcionViandas">
                <p>La "vianda vegetariana" es lo nuevo de la casa, tenemos opciones para todos los gustos. Incluye 
                    zanahoria, tomate, lechuga y rucula, no te quedes sin la tuya!!!
                </p>
            </div>

            <h2 class="precio">$100</h2>

        </section>

        
        <section class="contenedorVianda">
            
            <img src="./images/vianda pasta.jpg" alt="vianda fideos" class="fotoComida">

            <div class="plato">
                <h2 class="subtitulo"> Fideos con salsa:</h2>
            </div>

            <div class="descripcionViandas">
                <p> Lo ideal para matar este frio es comer unos ricos fideos con salsa y como siempre en Mi viandita!
                    tenemos para ofrecerte lo mejor. Para hacer tu pedido podes encontrarnos en la seccion "contactos".
                </p>
            </div>

            <h2 class="precio">$120</h2>

        </section>

    </article>



    <section class="tabla">

        <form>

                <div class="agregarAtabla">

                    <div class="inputsPrincipales">
                    <a class="textoInput"> Vianda: <input type="text" id="producto"> </a>
                    <a class="textoInput"> Precio:  <input type="number" id="precio"> </a>
                    </div>

                    
                        <div class="filtro">
                            <input type="checkbox" id="btn-celiacos">
                            <label for="btn-celiacos" class="celiacos">Para celiacos</label>
                        </div>
                    <div class="botonera">
                        <div class="botones">
                        <button type="button" id="agregar" >Agregar vianda</button>
                        <button type="button" id="agregar3" >x3</button>
                        <button type="button" id="vaciarTabla">Vaciar tabla</button>
                        </div>

                        <div class="verFiltro">
                            <a class="filtroText">Para todos</a>
                        <input type="checkbox" id="btn-filtro">
                        <label for="btn-filtro" class="icon-filtro"></label>
                        <a class="filtroText">Para celiacos</a>
                        </div>

                    </div>

                </div>

        </form>

        

        <table>
            <thead>
                <tr>
                    <th>Vianda nueva</th> <th>Precio</th><th>Total</th><th>Borrar/Editar</th>
                </tr>
            </thead>
            <tbody id="carrito">
            </tbody>
        </table>

    </section>-->

 <!-- BOTON CONSULTAS -->

    <section class="section-consultas">
        <a class="botonLogueo" href="login"> Logueate <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonConsultas" href="consultas"> Consultas</a>
        <a class="botonAdministrar" href="viandas"> Volver a "viandas"</a>
    </section>

 <!-- PIE DE PAGINA -->

    <footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="ilvero" class="ilvero"> Il Vero</a>
    </footer>

</body>
</html><?php }
}
