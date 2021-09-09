    <section class="section-consultas">

        {if (!isset($smarty.session.user))} <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->

            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        
            {else}
                <h3 class="user">{$smarty.session.user}</h3> 
                <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        {/if}
        <a class="botonConsultas" href="consultas"> Consultas</a>

        {if (isset($smarty.session.ROL) && ($smarty.session.ROL == "administrador"))} <!--CON ESTO SE VERIFICA SI EL USUARIO ES ADMIN O NO-->
            <a class="botonAdministrar" href="administracion"> Administrar</a>
        {/if}
    </section>