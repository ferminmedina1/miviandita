<?php

require_once('./api/apiModel/apiCommentsModel.php');
require_once('apiController.php');

class apiCommentsController extends apiController{

    function __construct(){

        parent::__construct();
        
        $this->model = new apiCommentsModel();
        $this->view = new apiView();

    }

    

    
 //TRAE LOS COMENTARIO SEGUN EL ID DE LA VIANDA
    function commentByViandaId($params = null){
        $id = $params[":ID"];
        $comentario = $this->model->getCommentsByVianda($id);
        if (!empty($comentario))
            $this->view->response($comentario, 200);
        else
            $this->view->response("No hay comentarios ya que la vianda con el id $id no existe o no tiene comentarios", 404);
    }

 //TRAE LOS COMENTARIO SEGUN EL ID DEL COMENTARIO
    function commentById($params = null){
        $id = $params[":ID"];
        $comentario = $this->model->getCommentById($id);
        if (!empty($comentario))
            $this->view->response($comentario, 200);
        else
            $this->view->response("No hay comentarios con el id $id", 404);
    }

 //TRAE TODOS LOS COMENTARIOS EN LA DB
    function allComentarios(){
        
        $comentarios = $this->model->getAllComments();
        if (!empty($comentarios))
            $this->view->response($comentarios, 200);
        else
            $this->view->response("No hay comentarios", 404);
    }

 //ELIMINAR UN COMENTARIO SEGUN SU ID
    function deleteComment($params = null) {

        $id_comentario = $params[":ID"];
        $resultado = $this->model->deleteComment($id_comentario);
        if ($resultado > 0) //SI ES MAYOR A CERO ES RECORRIO LA TABLA Y ELIMINO EL ELEMENTO
            $this->view->response("Borrado existoso", 200);
        else
            $this->view->response("No existe comentario con id = $id_comentario", 404);
    }

 //AGREGA UN NUEVO COMENTARIO A LA DB
    function addComment(){
        $body = $this->getData();
        $comentario = $this->model->insertComment($body->comentario, $body->id_vianda, $body->calificacion, $body->id_user);
     //SI RETORNA 1 ES PORQUE SE PUDO INGRESAR EL COMENTARIO, DE LO CONTRARIO NO 
        if ($comentario == 1)
            $this->view->response("Comentario ingresado correctamente", 200);
        else
            $this->view->response("No se pudo ingresar el comentario", 404);
    
    }

    
}