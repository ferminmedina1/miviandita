<?php 

require_once "./View/viandasView.php";
require_once "./Model/viandasModel.php";

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

        function mostrarTodas() {

            $viandas = $this->model->getViandas();
            $this->view->showAllViandas($viandas);

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
            $this->view->ShowAdminViandas();
        }

    
    }

?>