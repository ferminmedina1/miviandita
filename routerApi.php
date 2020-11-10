<?php

require_once ('routerClass.php');
require_once ('api/apiController/apicommentsController.php');

$r = new Router();

//TRAER COMENTARIO POR ID
$r->addRoute("comentarios/:ID", "GET", "apiCommentsController", "commentById");

//TRAER TODOS LOS COMENTARIOS
$r->addRoute("comentarios", "GET", "apiCommentsController", "allComentarios");

//ELIMINAR COMENTARIO
$r->addRoute("comentarios/:ID", "DELETE", "apiCommentsController", "deleteComment");

//INSERTAR COMENTARIO
$r->addRoute("calificarVianda", "POST", "apiCommentsController", "addComment");


$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 