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
            $viandas = $this->model->GetViandas();
            $this->view->ShowHome($viandas);
        }
        function AutoCompletar(){
            $tasks = $this->model->GetViandas();
    
            foreach($tasks as $task){
                $title = $task->title;
                $word = "Completada";
    
                if(strpos($title, $word) !== false){
                    $this->model->marcarCeliaca($task->id);
                }
            }
    
           $tasks = $this->model->GetTasks();
           
           $this->view->ShowHome($tasks);
        }
    
    }

?>