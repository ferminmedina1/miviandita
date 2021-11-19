<?php

require_once ('routerClass.php');
require_once ('api/apiController/apicommentsController.php');

$r = new Router();

//Ruta por defecto.
$r->setDefaultRoute("apiCommentsController", "allComentarios");

//TRAER COMENTARIO POR ID
$r->addRoute("comentarios/:ID", "GET", "apiCommentsController", "commentById");


//TRAER COMENTARIO POR ID de VIANDA
$r->addRoute("comentarios/vianda/:ID", "GET", "apiCommentsController", "commentByViandaId");

//TRAER TODOS LOS COMENTARIOS
$r->addRoute("comentarios", "GET", "apiCommentsController", "allComentarios");

//ELIMINAR COMENTARIO
$r->addRoute("comentarios/:ID", "DELETE", "apiCommentsController", "deleteComment");

//INSERTAR COMENTARIO
$r->addRoute("calificarVianda", "POST", "apiCommentsController", "addComment");

//EDITAR COMENTARIO
$r->addRoute("comentarios/:ID", "PUT", "apiCommentsController", "editComment");

$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 