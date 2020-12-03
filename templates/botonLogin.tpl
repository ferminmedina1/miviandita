<section class="section-consultas">
    
    {if (!isset($smarty.session.user))}    <!--CON ESTO SE VERIFICA QUE NO HAYA UN USUARIO LOGUEADO-->
        
            <a class="botonLogueo" href="login"> Loguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        {else}
            
                <h3 data-user="{$smarty.session.id_user}" class="user"> {$smarty.session.user} </h3>
            
            <a class="botonLogueo" href="logout"> Desloguearse <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
       
    {/if}
    <a class="botonConsultas" href="consultas"> Consultas</a>

</section>