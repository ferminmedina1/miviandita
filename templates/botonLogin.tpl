<section class="section-consultas">
    
    {if (!isset($smarty.session.EMAIL))}    <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->
        
            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        {else}
            <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>

    {/if}
    <a class="botonConsultas" href="consultas"> Consultas</a>

</section>