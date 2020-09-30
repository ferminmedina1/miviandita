<?php 

require_once "viandasView.php";
require_once "viandasModel.php";

    class viandasController{
        private $view;
        private $model;
    
        function __construct(){
            $this->view = new viandasView();
            $this->model = new viandasModel();
        }
        
        function Home(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowHome();
        }

        function Viandas(){//////////////MEJORAR PARA VIANDAS
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
            $this->view->showHomeLocation();
            //falta hacer un else que muestre q falto ingrear un dato
        }

        function nuevaCategoria(){
            
            if (!empty($_POST['tipo_vianda'])){
                $this->model->insertCategoria($_POST['tipo_vianda']);
            }
                $this->view->showHomeLocation();
            //falta hacer un else que muestre q falto ingrear un dato
        }

        function Promo(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowPromo();
        }

        function Contacto(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowContacto();
        }

        function Sobre(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowSobre();
        }

        function Ilvero(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowIlvero();
        }

        function Consultas(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowConsultas();
        }

        function Log(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowLog();
        }

        function Register(){//////////////MEJORAR PARA VIANDAS
            $this->view->ShowRegister();
        }

        function AdminViandas(){//////////////MEJORAR PARA VIANDAS
            $categorias = $this->model->getCategoria();
            $viandas = $this->model->getViandas();
            $this->view->ShowAdminViandas($categorias,$viandas);
        }

        function Categorias(){
            $categorias = $this->model->getCategoria();
            return $categorias;
        }
    }

?>