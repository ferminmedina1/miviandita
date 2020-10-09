<?php 

require_once "./app/View/viandasView.php";
require_once "./app/Model/viandasModel.php";
require_once "./app/View/categoriasView.php";
require_once "./app/Model/categoriasModel.php";
require_once "./app/Controller/userController.php";

    class categoriasController{
        private $viewCategorias;
        private $modelCategorias;
    
        function __construct(){
            $this->viewViandas = new viandasView();
            $this->modelViandas = new viandasModel();
            $this->viewCategorias = new categoriasView();
            $this->modelCategorias = new categoriasModel();
            $userController = new userController();
            $userController->checkLoggedIn();     //SE INICIA EN EL CONSTRUCTOR PARA QUE EN TODAS LAS PAGINAS HAYA UNA SESION
        }

        function mostrarPorCategoria($params = null) {
            //$dirigidoA = $_GET['action'];
            $categoria = $params[":TIPO_VIANDA"];

            $viandas = $this->modelCategorias->getViandasByDirigidoA($categoria);
            $this->viewCategorias->showViandaByCategoria($categoria, $viandas);
        }
        function nuevaCategoria(){
            
            if (!empty($_POST['tipo_vianda'])){
                $this->modelCategorias->insertCategoria($_POST['tipo_vianda']);
            }
                $this->viewViandas->showAdminLocation();
            //falta hacer un else que muestre q falto ingrear un dato
        }
        function eliminarCategoria($params = null){
            $categoria_ID = $params[':ID'];
            $this->modelCategorias->deleteCategoria($categoria_ID);
            $this->viewViandas->showAdminLocation();
        }
        function showFormEditarCategoria($params = null){
            $idCategoria = $params[":ID"];
            $categoria = $this->modelCategorias->getCategoriaByID($idCategoria);
            $this->viewCategorias->showFormularioEditarCategoria($categoria);
        }
        
        function editarCategoria($params = null){
            $categoria_ID = $params[':ID'];
            
            if((!empty($_POST['nombre']))) {
                    $this->modelCategorias->updateCategoria($_POST['nombre'], $categoria_ID);
            }
            $this->viewViandas->showAdminLocation();   
        }
    }
?>