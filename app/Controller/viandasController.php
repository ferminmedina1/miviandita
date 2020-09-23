<?php 

require_once "./View/viandasView.php";
require_once "./Model/viandasModel.php";

    class viandasController{
        private $view;
        private $model;
    
        function __construct(){
            $this->view = new TasksView();
            $this->model = new viandasModel();
        }
        
        function Home(){//////////////MEJORAR PARA VIANDAS
            $tasks = $this->model->GetTasks();
            $this->view->ShowHome($tasks);
        }
        function AutoCompletar(){
            $tasks = $this->model->GetTasks();
    
            foreach($tasks as $task){
                $title = $task->title;
                $word = "Completada";
    
                if(strpos($title, $word) !== false){
                    $this->model->MarkAsCompletedTask($task->id);
                }
            }
    
           $tasks = $this->model->GetTasks();
           
           $this->view->ShowHome($tasks);
        }
    
    }

?>