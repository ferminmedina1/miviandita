<?php 

require_once "./app/View/viandasView.php";
require_once "./app/Model/viandasModel.php";
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

//VER VIANDA
    function verVianda($params = null){

        $id_vianda = $params[":ID"];
        $vianda = $this->model->getViandaByID($id_vianda);
        if($vianda)
            $this->view->showVianda($vianda);
        else
            $this->view->showViandasLocation();

    }
    
 //MUESTRA EL FORMULARIO INGRESAR VIANDAS Y LAS AGREGA A LA DB
    function ingresarVianda(){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){    
            if((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['precio'])) && (!empty($_POST['dirigidoA']))) {
                $this->model->insertVianda($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['dirigidoA']);
            }
            $this->view->showAdminViandasLocation(); 
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
        
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
    function showAdministracion(){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){
            $this->view->ShowAdministracion();
            /*$categorias = $this->modelCategorias->getCategoria();
            $viandas = $this->model->getViandas();
            $this->view->ShowAdminViandas($categorias,$viandas);*/
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

    function adminViandas(){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){

           $categorias = $this->modelCategorias->getCategoria();
            $viandas = $this->model->getViandas();
            $this->view->ShowAdminViandas($viandas, $categorias);
        }
        else{
            header("Location: ".LOGIN);
            die();
        }

    }

 //ELIMINA LA VIANDA SELECCIONADA
    function eliminarVianda($params = null){

        $admin = $this->verificarSiESAdmin();
        if ($admin == True){ 
            $vianda_ID = $params[':ID'];
            $this->model->deleteVianda($vianda_ID);
            $this->view->showAdminViandasLocation(); 
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
        
    }

 //MUESTRA EL FORMULARIO EDITAR VIANDA
    function showFormEditar($params = null){
        $admin = $this->verificarSiESAdmin();
        
        if ($admin == True){ 
            $idVianda = $params[":ID"];
            $vianda = $this->model->getViandaByID($idVianda);
            $categorias = $this->modelCategorias->getCategoria();
            $this->view->showFormularioEditar($vianda,$categorias);
        }
        else{
            header("Location: ".LOGIN);
            die();
        }

    }

 //EDITA LA VIANDA EN LA DB
    function editarVianda($params = null){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){ 
            $vianda_ID = $params[':ID'];
            if((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['precio'])) && (!empty($_POST['dirigidoA']))) {
                    $this->model->updateVianda($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['dirigidoA'], $vianda_ID);
            }
            $this->view->showAdminViandasLocation();   
        }
        else{
            header("Location: ".LOGIN);
            die();
        }     
    }

 //BARRERA DE SEGURIDAD DEL CONTROLLER
    private function checkLoggedIn(){
        session_start();                    //SE INICIA UNA SESION
        if(!isset($_SESSION["user"])){     //SI NO ESTA SETEADO EL EMAIL (NO HAY USUARIO LOGUEADO)
            $_SESSION["ROL"] = "visitante"; //SE LE ASIGNA UN ROL A CUALQUIERA QUE ACCEDA A LA PAGINA
        }  
    }

 //VERIFICA SI EL USUARIO EN LA SESION ES ADMIN
    private function verificarSiESAdmin(){
        
        if((isset($_SESSION["ROL"])) && ($_SESSION["ROL"] != "administrador")){
            $admin = False;
        }
        else{
            $admin = True;
        }
        return $admin;
    }

}
?>