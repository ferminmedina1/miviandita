<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Viandas</title>
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="./css/responsive/responsive.css">

    <link rel="stylesheet" href="./css/responsive/responsive-allViandas.css">
    <script type="text/javascript" src="./js/detalleVianda.js"></script>
</head>
<body>
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

    <nav>

        <div class="menu">

            <a href="home" class="item">Home</a>
            <a href="viandas" class="item">Viandas</a>
            <a href="promociones" class="item">Promociones </a>
            <a href="contacto" class="item">Contacto</a>
            <a href="sobremiviandita" class="item">Sobre Mi Viandita</a>

        </div>

    </nav>

    <h2 class="tituloAllViandas">TODAS LAS VIANDAS</h2>

    
    <div class="allViandas">
        
        {foreach from=$allViandas item=vianda}
            <div class="contenedorVianda">

                
                    <button class="plato">{$vianda->nombre}</button>

                    <div class="oculto">
                        <div class="descripcionViandas">
                            <p>{$vianda->descripcion}</p>
                            <h3 class="precio">${$vianda->precio}</h3>
                        </div>
                    </div>
                </div>
        {/foreach}
            <div class="contenedorVolver">
                    <a href="viandas" class="volver" hr>Volver</a>
            </div>
    </div>
    
 <!-- BOTON CONSULTAS & BOTON LOGIN-->

    <section class="section-consultas">
        <a class="botonLogueo" href="login"> Logueate <img src="./images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonConsultas" href="consultas"> Consultas</a>
    </section>  

    <footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="ilvero" class="ilvero"> Il Vero</a>
    </footer>

</body>
</html>