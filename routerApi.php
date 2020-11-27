<?php

require_once 'RouterClass.php';
require_once 'api/ApiCommentController.php';

$router = new Router();

$router->addRoute("comentarios", "GET", "ApiCommentController", "getAllComentarios");
$router->addRoute("comentarios/:ID", "GET", "ApiCommentController", "getComentario");
$router->addRoute("comentarios/:ID", "DELETE", "ApiCommentController", "eliminarComentario");
$router->addRoute("comentarios", "POST", "ApiCommentController", "agregarComentario");
$router->addRoute("comentarios/:ID", "PUT", "ApiCommentController", "editarComentario");
$router->addRoute("serie/:ID/comentarios", "GET", "ApiCommentController", "getComentariosPorSerie");

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 