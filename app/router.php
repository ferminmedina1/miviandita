<?php
    require_once 'Controller/viandasController.php';
    require_once 'routerClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "viandasController", "Home");

    //Esto lo veo en TasksView
    $r->addRoute("insert", "POST", "viandasController", "InsertTask");
    $r->addRoute("delete/:ID", "GET", "viandasController", "BorrarLaTaskQueVienePorParametro");
    $r->addRoute("completar/:ID", "GET", "viandasController", "MarkAsCompletedTask");

    //Ruta por defecto.
    $r->setDefaultRoute("viandasController", "Home");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>