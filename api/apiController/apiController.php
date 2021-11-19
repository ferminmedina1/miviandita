<?php

require_once ('./api/apiView/apiView.php');

abstract class ApiController {
    protected $view;
    private $data; 

    public function __construct() {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input"); 
    }

 //LO QUE TRAJO DEL FORMULARIO LO CONVIERTE A JSON Y LO RETORNA
    function getData(){ 
        return json_decode($this->data); 
    }  
}