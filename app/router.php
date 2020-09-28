<?php
    require_once 'Controller/viandasController.php';
    require_once 'routerClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "viandasController", "Home"); // ($url, $verb(GET/POST), $controller, $method(Funcion))

    $r->addRoute("viandas", "GET", "viandasController", "Viandas"); // ($url, $verb(GET/POST), $controller, $method(Funcion))

    $r->addRoute("promociones", "GET", "viandasController", "Promo"); // ($url, $verb(GET/POST), $controller, $method(Funcion))

    $r->addRoute("contacto", "GET", "viandasController", "Contacto"); // ($url, $verb(GET/POST), $controller, $method(Funcion))

    $r->addRoute("sobremiviandita", "GET", "viandasController", "Sobre"); // ($url, $verb(GET/POST), $controller, $method(Funcion))
    
    $r->addRoute("consultas", "GET", "viandasController", "Consultas"); // ($url, $verb(GET/POST), $controller, $method(Funcion))

    $r->addRoute("ilvero", "GET", "viandasController", "Ilvero");
    
    $r->addRoute("login", "GET", "viandasController", "Log"); // ($url, $verb(GET/POST), $controller, $method(Funcion))

    $r->addRoute("register", "GET", "viandasController", "Register"); // ($url, $verb(GET/POST), $controller, $method(Funcion))

    $r->addRoute("verTodos", "GET", "viandasController", "mostrarTodas");

    $r->addRoute("adminViandas", "GET", "viandasController", "AdminViandas");


    //Ruta por defecto.
    $r->setDefaultRoute("viandasController", "Home");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>