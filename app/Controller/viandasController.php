<?php 

require_once "./app/View/viandasView.php";
require_once "./app/Model/viandasModel.php";
/*require_once "./app/View/categoriasView.php";*/
require_once "./app/Model/categoriasModel.php";
require_once "./app/Controller/userController.php";

class viandasController{

    private $view;
    private $model;
    private $viewCategorias;
    private $modelCategorias;

    function __construct(){
        $this->view = new viandasView();
        $this->model = new viandasModel();
        $this->viewCategorias = new categoriasView();
        $this->modelCategorias = new categoriasModel();
        $this->checkLoggedIn();     //SE INICIA EN EL CONSTRUCTOR PARA QUE EN TODAS LAS PAGINAS HAYA UNA SESION
        
    }

 //MUESTRA EL HOME
    function Home(){
        $this->view->ShowHome();
    }

 //MUESTRA TODAS LAS VIANDAS  
    function mostrarTodas() {
        
        $viandas = $this->model->getViandas();
        $this->view->showAllViandas($viandas);
        
    }
    
 //MUESTRA EL FORMULARIO INGRESAR VIANDAS Y LAS AGREGA A LA DB
    function ingresarVianda(){
        $this->verificarSiESAdmin();
        if((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['precio'])) && (!empty($_POST['dirigidoA']))) {
            
            $this->model->insertVianda($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['dirigidoA']);
            
        }
        $this->view->showAdminLocation();
        
    }

 //MUESTRA LA SECCION PROMOS
    function Promo(){
        
        $this->view->ShowPromo();
    }

 //MUESTRA LA SECCION CONTACTOS
    function Contacto(){
        $this->view->ShowContacto();
    }

 //MUESTRA LA SECCION SOBRE
    function Sobre(){
        
        $this->view->ShowSobre();
    }

 //MUESTRA LA SECCION ILVERO
    function Ilvero(){
        $this->view->ShowIlvero();
    }
    
 //MUESTRA LA SECCION CONSULTAS
    function Consultas(){
        $this->view->ShowConsultas();
    }

 //MUESTRA ADMINISTRACION DE VIANDAS/CATEGORIAS
    function AdminViandas(){
        $this->verificarSiESAdmin();
        $categorias = $this->modelCategorias->getCategoria();
        $viandas = $this->model->getViandas();
        $this->view->ShowAdminViandas($categorias,$viandas);
    }

 //ELIMINA LA VIANDA SELECCIONADA
    function eliminarVianda($params = null){
        $this->verificarSiESAdmin();
        $vianda_ID = $params[':ID'];
        $this->model->deleteVianda($vianda_ID);
        $this->view->showAdminLocation();
        
    }

 //MUESTRA EL FORMULARIO EDITAR VIANDA
    function showFormEditar($params = null){
        $this->verificarSiESAdmin();
        $idVianda = $params[":ID"];
        $vianda = $this->model->getViandaByID($idVianda);
        $categorias = $this->modelCategorias->getCategoria();
        $this->view->showFormularioEditar($vianda,$categorias);
    }

 //EDITA LA VIANDA EN LA DB
    function editarVianda($params = null){
        $this->verificarSiESAdmin();
        $vianda_ID = $params[':ID'];
        
        if((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['precio'])) && (!empty($_POST['dirigidoA']))) {
                $this->model->updateVianda($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['dirigidoA'], $vianda_ID);
        }
        $this->view->showAdminLocation();        
    }

 //BARRERA DE SEGURIDAD DEL CONTROLLER
    private function checkLoggedIn(){
        session_start();                    //SE INICIA UNA SESION
        if(!isset($_SESSION["EMAIL"])){     //SI NO ESTA SETEADO EL EMAIL (NO HAY USUARIO LOGUEADO)
            $_SESSION["ROL"] = "visitante"; //SE LE ASIGNA UN ROL A CUALQUIERA QUE ACCEDA A LA PAGINA
        }
        else{
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {    //SE VERIFICA LA ULTIMA ACCION EN LA PAGINA, SI ES MAYOR A 30m SE CIERRA LA SESION
                header("Location: ".LOGOUT);    //CIERRA LA SESION
                die();
            } 
            $_SESSION['LAST_ACTIVITY'] = time();    //SE ACTUALIZA EL TIEMPO
        }  
    }

 //VERIFICA SI EL USUARIO EN LA SESION ES ADMIN
    private function verificarSiESAdmin(){
        if((isset($_SESSION["ROL"])) && ($_SESSION["ROL"] != "administrador")){
            header("Location: ".LOGIN);
            die();
        }
    }

}

?>