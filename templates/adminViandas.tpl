<!DOCTYPE html>
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
    <script type="text/javascript" src="./js/nav.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <base href="{$base_url}">
</head>

<body>

 <!-- ENCABEZADO -->
    
    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

    {include file="nav.tpl"}

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
                        {foreach from=$tipo item=categoria}
                            <option value="{$categoria->id_dirigidoA}">{$categoria->tipo_vianda}</option>
                        {/foreach}
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
                {foreach from=$allViandas item=vianda}
                    <tr><td>{$vianda->nombre}</td><td>{$vianda->descripcion}</td><td>{$vianda->precio}</td><td>{$vianda->tipo_vianda}</td>
                    <td class="botonBorrar"> <a href='elimiarVianda/{$vianda->id_vianda}'><button class="botonBorrarTD" id="{$vianda->id_vianda}"><i class="fa fa-trash-o"></i></button></a>
                    <a href='editarVianda/{$vianda->id_vianda}' ><button class="botonEditarTD" id="{$vianda->id_vianda}"><i class="fa fa-edit"></i></button></a></td></tr>
                {/foreach}
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
                {foreach from=$tipo item=categoria}
                    <tr><td>{$categoria->tipo_vianda}</td>
                    <td class="botonBorrar"> <a href='elimiarCategoria/{$categoria->id_dirigidoA}'><button class="botonBorrarTD" id="{$categoria->id_dirigidoA}"><i class="fa fa-trash-o"></i></button></a>
                    <a href='editarCategoria/{$categoria->id_dirigidoA}'><button class="botonEditarTD" id="{$categoria->id_dirigidoA}"><i class="fa fa-edit"></i></button></a></td></tr>
                {/foreach}
            </tbody>
        </table>

 <!-- BOTON CONSULTAS Y LOGIN -->

    <section class="section-consultas">
        <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonAdministrar" href="viandas"> Volver a "viandas"</a>
    </section>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>