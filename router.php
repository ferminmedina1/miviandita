<?php
    require_once('app/Controller/viandasController.php');
    require_once('app/Controller/userController.php');
    require_once('routerClass.php');
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    $r = new Router();

    // rutas viejas
    $r->addRoute("home", "GET", "viandasController", "Home"); // ($url, $verb(GET/POST), $controller, $method(Funcion))
    $r->addRoute("viandas", "GET", "viandasController", "Viandas"); 
    $r->addRoute("promociones", "GET", "viandasController", "Promo"); 
    $r->addRoute("contacto", "GET", "viandasController", "Contacto"); 
    $r->addRoute("sobremiviandita", "GET", "viandasController", "Sobre"); 
    $r->addRoute("consultas", "GET", "viandasController", "Consultas"); 
    $r->addRoute("ilvero", "GET", "viandasController", "Ilvero");

    $r->addRoute("verTodos", "GET", "viandasController", "mostrarTodas");
   
    $r->addRoute("categoria/:TIPO_VIANDA","GET", "viandasController", "mostrarPorCategoria");

    $r->addRoute("adminViandas", "GET", "viandasController", "AdminViandas");

    $r->addRoute("agregarVianda", "POST", "viandasController", "ingresarVianda");

    $r->addRoute("agregarCategoria", "POST", "viandasController", "nuevaCategoria");

    //ELIMINAR
    $r->addRoute("elimiarVianda/:ID", "GET", "viandasController", "eliminarVianda");
    $r->addRoute("elimiarCategoria/:ID", "GET", "viandasController", "eliminarCategoria");

    //EDITAR 
    $r->addRoute("editarVianda/:ID", "GET", "viandasController", "showFormEditar");
    $r->addRoute("actualizarVianda/:ID", "POST", "viandasController", "editarVianda");

    $r->addRoute("editarCategoria/:ID", "GET", "viandasController", "showFormEditarCategoria");
    $r->addRoute("actualizarCategoria/:ID", "POST", "viandasController", "editarCategoria");

    //UserController
    $r->addRoute("login", "GET", "userController", "Log");
    $r->addRoute("logout", "GET", "userController", "Logout");
    $r->addRoute("register", "GET", "userController", "Register");

    $r->addRoute("verifyUser", "POST", "userController", "VerifyUser");
    $r->addRoute("agregarUser", "POST", "userController", "addUser");

    //Ruta por defecto.
    $r->setDefaultRoute("viandasController", "Home");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>