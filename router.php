<?php
    require_once('app/Controller/viandasController.php');
    require_once('app/Controller/userController.php');
    require_once('app/Controller/categoriasController.php');
    require_once('routerClass.php');
    
 // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    $r = new Router();

 //NAVEGACION EN LA PAGINA
    $r->addRoute("home", "GET", "viandasController", "Home");
    $r->addRoute("viandas", "GET", "categoriasController", "categorias"); 
    $r->addRoute("promociones", "GET", "viandasController", "Promo"); 
    $r->addRoute("contacto", "GET", "viandasController", "Contacto"); 
    $r->addRoute("sobremiviandita", "GET", "viandasController", "Sobre");
    $r->addRoute("consultas", "GET", "viandasController", "Consultas"); 
    $r->addRoute("ilvero", "GET", "viandasController", "Ilvero");


 //VER TODAS LAS VIANDAS 
    $r->addRoute("verTodas", "GET", "viandasController", "mostrarTodas");
    $r->addRoute("vianda/:ID", "GET", "viandasController", "verVianda");
 
 //VER CADA CATEGORIA
    $r->addRoute("categoria/:TIPO_VIANDA","GET", "categoriasController", "mostrarPorCategoria");


 //ADMINISTRACION, AGREGAR VIANDA/CATEGORIA
    $r->addRoute("administracion", "GET", "viandasController", "showAdministracion");
    $r->addRoute("administracion/viandas", "GET", "viandasController", "adminViandas");
    $r->addRoute("administracion/categorias","GET", "categoriasController", "adminCategorias");
    $r->addRoute("administracion/usuarios", "GET", "userController", "adminUsuarios");
    
    $r->addRoute("agregarVianda", "POST", "viandasController", "ingresarVianda");
    $r->addRoute("agregarCategoria", "POST", "categoriasController", "nuevaCategoria");

 //ELIMINAR VIANDA/CATEGORIA\
    $r->addRoute("eliminarVianda/:ID", "GET", "viandasController", "eliminarVianda");
    $r->addRoute("eliminarCategoria/:ID", "GET", "categoriasController", "eliminarCategoria");

 //EDITAR/ACTUALIZAR VIANDAS
    $r->addRoute("editarVianda/:ID", "GET", "viandasController", "showFormEditar");
    $r->addRoute("eliminarImagenVianda/:ID", "GET", "viandasController", "eliminarImagenVianda");
    $r->addRoute("actualizarVianda/:ID", "POST", "viandasController", "editarVianda");

 //EDITAR/ACTUALIZAR CATEGORIAS
    $r->addRoute("editarCategoria/:ID", "GET", "categoriasController", "showFormEditarCategoria");
    $r->addRoute("actualizarCategoria/:ID", "POST", "categoriasController", "editarCategoria");

//ELIMINAR USUARIO
   $r->addRoute("eliminarUsuario/:ID", "GET", "userController", "eliminarUsuario");

//EDITAR/ACTUALIZAR ROL DE USUARIOS
   $r->addRoute("editarPermisos/:ID", "GET", "userController", "showFormEditarUser");
   $r->addRoute("actualizarPermisos/:ID", "POST", "userController", "editarRol");

 //LOGIN, LOGOUT Y REGISTER
    $r->addRoute("login", "GET", "userController", "Log");
    $r->addRoute("logout", "GET", "userController", "logout");
    $r->addRoute("register", "GET", "userController", "Register");

    $r->addRoute("verifyUser", "POST", "userController", "VerifyUser");
    $r->addRoute("agregarUser", "POST", "userController", "addUser");
    $r->addRoute("agregarAdmin", "POST", "userController", "addAdmin");

 //Ruta por defecto.
    $r->setDefaultRoute("viandasController", "Home");
 //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>