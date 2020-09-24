<?php

class viandasView{

    private $title;
    

    function __construct(){
        $this->title = "Lista de Viandas";
    }

    function ShowHome($viandas){

        $html = '
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Viandita! - Viandas</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/viandas.css">
    <link rel="stylesheet" href="../css/responsive/responsive.css">
    <link rel="stylesheet" href="../css/responsive/responsive-viandas.css">
    <script type="text/javascript" src="../js/nav.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

 <!-- ENCABEZADO -->
    
    <header>

        <div class="encabezado">

            <div class="tituloYlogo">
                
                <a href="index.html"><img src="../images/LOGO2.png" alt="MiViandita!" class="logoEncabezado"></a>
            
                <h1 class="titulo"> Mi Viandita!</h1>

            </div>

            <input type="checkbox" id="btn-menu">
            <label for="btn-menu" class="icon-menu"><img src="../images/menu.png" class="imagenMenu"></label>
       
        </div>
        
    </header>

 <!-- MENU DE NAVEGACION -->

    <nav>

        <div class="menu">
            <a href="index.html" class="item">Home</a>
            <a href="#" class="itemPrincipal">Viandas</a>
            <a href="promo.html" class="item">Promociones </a>
            <a href="contacto.html" class="item">Contacto</a>
            <a href="sobre.html" class="item">Sobre Mi Viandita</a>
        </div>

    </nav>

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
            <!--       <button type="button" id="borrar1" >Eliminar ultimo producto</button> --> 
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
            <tbody id="carrito">';

              
            foreach($viandas as $vianda){
              $vianda->id;
              if(isset($vianda)){
                $html .= '<li class="list-group-item">' . $vianda->title . '<span class="badge badge-primary badge-pill">'. $vianda->description .'</span> <button type="button" class="btn btn-outline-danger"><a href="delete/'.$vianda->id.'">Borrar</a></button></li>';
              }
            }
        
        
      $html .= '
            </tbody>
        </table>

    </section>

 <!-- BOTON CONSULTAS -->

    <section class="section-consultas">
        <a class="botonLogueo" href="log.html"> Logueate <img src="../images/user.png" alt="user.img" class="imagenConsultas"></a>
        <a class="botonConsultas" href="consultas.html"> Consultas</a>
    </section>

 <!-- PIE DE PAGINA -->

    <footer>
        <a> Diseño Web || Fermín Medina || Agustín Arleo </a>
        <a> © Mi Viandita 2020. Todos los derechos reservados.</a>
        <a href="Ilvero/Ilvero.html" class="ilvero"> Il Vero</a>
    </footer>

</body>
</html>';
            echo $html;
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}


?>