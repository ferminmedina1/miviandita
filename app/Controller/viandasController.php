<?php 

require_once "./app/View/viandasView.php";
require_once "./app/Model/viandasModel.php";
require_once "./app/View/categoriasView.php";
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
            $userController = new userController();
            $userController->checkLoggedIn();     //SE INICIA EN EL CONSTRUCTOR PARA QUE EN TODAS LAS PAGINAS HAYA UNA SESION
        }
        
        function Home(){
            $this->view->ShowHome();
        }

        function Viandas(){
            $categorias = $this->modelCategorias->getCategoria();
            $this->view->ShowViandas($categorias);
        }

        
        function mostrarTodas() {
            
            $viandas = $this->model->getViandas();
            $this->view->showAllViandas($viandas);
            
        }
        
        function ingresarVianda(){
            
            if((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['precio'])) && (!empty($_POST['dirigidoA']))) {
                
                $this->model->insertVianda($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['dirigidoA']);
                
            }
            $this->view->showAdminLocation();
            //falta hacer un else que muestre q falto ingrear un dato
        }
        
        
        function Promo(){
            
            $this->view->ShowPromo();
        }
        
        function Contacto(){
            $this->view->ShowContacto();
        }
        
        function Sobre(){
            
            $this->view->ShowSobre();
        }
        
        function Ilvero(){
            $this->view->ShowIlvero();
        }
        
        function Consultas(){
            $this->view->ShowConsultas();
        }
        
        function AdminViandas(){
            $categorias = $this->modelCategorias->getCategoria();
            $viandas = $this->model->getViandas();
            $this->view->ShowAdminViandas($categorias,$viandas);
        }
        
        function eliminarVianda($params = null){
            $vianda_ID = $params[':ID'];
            $this->model->deleteVianda($vianda_ID);
            $this->view->showAdminLocation();
            
        }
        
        
        function showFormEditar($params = null){
            $idVianda = $params[":ID"];
            $vianda = $this->model->getViandaByID($idVianda);
            $categorias = $this->modelCategorias->getCategoria();
            $this->view->showFormularioEditar($vianda,$categorias);
        }

        function editarVianda($params = null){
            $vianda_ID = $params[':ID'];
            
            if((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['precio'])) && (!empty($_POST['dirigidoA']))) {
                    $this->model->updateVianda($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['dirigidoA'], $vianda_ID);
            }
            $this->view->showAdminLocation();        
        }
 
    }

?>