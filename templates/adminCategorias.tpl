<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/viandas.css">
    <link rel="stylesheet" href="../css/adminCategorias.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-viandas.css">
    <base href="{$base_url}">
    <script type="text/javascript" src="./js/nav.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

    {if (!isset($smarty.session.user))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

        {include file="nav.tpl"}
        
    {else}
        {include file="navUser.tpl"}
    {/if}


    <div class="categorias">
    <h4>ADMINISTRAR CATEGORIAS</h4>

        <form action="agregarCategoria" method="post">

                <div class="categoriaNueva">
                
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
            <td class="botonBorrar"> <a href='eliminarCategoria/{$categoria->id_dirigidoA}'><button class="botonBorrarTD" id="{$categoria->id_dirigidoA}"><i class="fa fa-trash-o"></i></button></a>
            <a href='editarCategoria/{$categoria->id_dirigidoA}'><button class="botonEditarTD" id="{$categoria->id_dirigidoA}"><i class="fa fa-edit"></i></button></a></td></tr>
        {/foreach}
    </tbody>
    </table>



    <section class="section-consultas">
        <h3 class="user">{$smarty.session.user}</h3>
        <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonAdministrar" href="administracion"> Volver a administración</a>
    </section>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>