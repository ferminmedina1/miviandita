<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/viandas.css">
    <link rel="stylesheet" href="../css/adminViandas.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-viandas.css">
    <script type="text/javascript" src="../js/nav.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <base href="{$base_url}">
</head>

<body>

<!-- ENCABEZADO -->
    
    {include file="encabezado.tpl"}

 <!-- MENU DE NAVEGACION -->

    {if (!isset($smarty.session.user))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

        {include file="nav.tpl"}

    {else}
        {include file="navUser.tpl"}
    {/if}



    <h2 class="tituloAdministracion">ADMINISTRAR USUARIOS</h2>


        <table>
            <thead>
                <tr>
                    <th>Usuario</th><th>Tipo de usuario</th><th>Eliminar / Editar rol</th>
                </tr>
            </thead>
            <tbody id="viandasTable">
                {foreach from=$usuarios item=user}
                    <tr><td>{$user->user}</td><td>{$user->rol}</td>
                    <td class="botonBorrar"> <a href='eliminarUsuario/{$user->id_user}'><button class="botonBorrarTD" id="{$user->id_user}"><i class="fa fa-trash-o"></i></button></a>
                    <a href='editarPermisos/{$user->id_user}' ><button class="botonEditarTD" id="{$user->id_user}"><i class="fa fa-edit"></i></button></a></td></tr>
                {/foreach}
            </tbody>
        </table>



<!-- BOTON CONSULTAS Y LOGIN -->

    <section class="section-consultas">
        <h3 class="user">{$smarty.session.user}</h3>
        <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonAdministrar" href="administracion"> Volver a administración</a>
    </section>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>