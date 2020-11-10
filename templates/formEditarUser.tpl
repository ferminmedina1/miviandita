<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Administracion - Editar Categoria</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/formEditarUsuario.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-consultas.css">
    <script type="text/javascript" src="../js/nav.js"></script>
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


 <!-- FORMULARIO -->

    <article>

        <section class="contenedorform">
            
            <h2 class="tituloFormEditar"> EDITAR PERMISOS DE ADMINISTRACIÓN</h2>

            <form class="formulario" method="post" action="actualizarPermisos/{$usuario->id_user}">
                
                <h4 class="usuario"> Usuario: &nbsp; <label class="email">{$usuario->user}</label> </h4> 
                <p>Actualmente es:&nbsp; {$usuario->rol}</p>           
                <h4 class="seleccionarRol"> Seleccione el nuevo rol del usuario</h4>
                
                <div class="inputs">
                    <label><input type="radio" name="rol" value="administrador" required > Administrador</label>
                    <label><input type="radio" name="rol" value="cliente" required> Cliente</label>
                </div>
                <button type="submit" id="botonEnviar">Actualizar permisos</button>

            </form>

        </section>

    </article>

        <section class="section-consultas">
            <a class="botonAdministrar" href="administracion/usuarios"> Volver a administrar</a>
        </section>

 <!-- FOOTER -->

    {include file="footer.tpl"}

</body>
</html>