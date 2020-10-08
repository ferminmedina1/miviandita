<?php 

require_once "./app/View/viandasView.php";
require_once "./app/Model/viandasModel.php";

    class viandasController{
        private $view;
        private $model;
    
        function __construct(){
            $this->view = new viandasView();
            $this->model = new viandasModel();
            $this->checkLoggedIn();     //SE INICIA EN EL CONSTRUCTOR PARA QUE EN TODAS LAS PAGINAS HAYA UNA SESION
        }
        
        function Home(){
            $this->view->ShowHome();
        }

        function Viandas(){
            
            
            $categorias = $this->model->getCategoria();
            $this->view->ShowViandas($categorias);
        }

        function mostrarPorCategoria($params = null) {
            //$dirigidoA = $_GET['action'];
            
            $categoria = $params[":TIPO_VIANDA"];

            $viandas = $this->model->getViandasByDirigidoA($categoria);
            $this->view->showViandaByCategoria($categoria, $viandas);
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

        function nuevaCategoria(){
            
            if (!empty($_POST['tipo_vianda'])){
                $this->model->insertCategoria($_POST['tipo_vianda']);
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
            $categorias = $this->model->getCategoria();
            $viandas = $this->model->getViandas();
            $this->view->ShowAdminViandas($categorias,$viandas);
        }

        function eliminarVianda($params = null){
            $vianda_ID = $params[':ID'];
            $this->model->deleteVianda($vianda_ID);
            $this->view->showAdminLocation();

        }

        function eliminarCategoria($params = null){
            $categoria_ID = $params[':ID'];
            $this->model->deleteCategoria($categoria_ID);
            $this->view->showAdminLocation();
        }

        function showFormEditar($params = null){
            $idVianda = $params[":ID"];
            $vianda = $this->model->getViandaByID($idVianda);
            $categorias = $this->model->getCategoria();
            $this->view->showFormularioEditar($vianda,$categorias);
        }
        
        function showFormEditarCategoria($params = null){
            $idCategoria = $params[":ID"];
            $categoria = $this->model->getCategoriaByID($idCategoria);
            $this->view->showFormularioEditarCategoria($categoria);
        }

        function editarVianda($params = null){
            $vianda_ID = $params[':ID'];
            
            if((!empty($_POST['nombre'])) && (!empty($_POST['descripcion'])) && (!empty($_POST['precio'])) && (!empty($_POST['dirigidoA']))) {
                    $this->model->updateVianda($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['dirigidoA'], $vianda_ID);
            }
            $this->view->showAdminLocation();        
        }

        function editarCategoria($params = null){
            $categoria_ID = $params[':ID'];
            
            if((!empty($_POST['nombre']))) {
                    $this->model->updateCategoria($_POST['nombre'], $categoria_ID);
            }
            $this->view->showAdminLocation();   
        }

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
 
    }

?>