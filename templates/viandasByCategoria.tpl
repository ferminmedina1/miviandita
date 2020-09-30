<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - {$titulo_tipo} </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-viandaByCategory.css">
    <base href="{$base_url}">
    <script type="text/javascript" src="./js/nav.js"></script>
    <script type="text/javascript" src="./js/detalleVianda.js"></script>
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

        <h2 class="tituloAllViandas">TIPO DE VIANDA: {$titulo_tipo|upper}</h2>

    
    <div class="allViandas">
        
        {foreach from=$viand item=vianda}
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
</html>