<?php
require_once './Model/CommentModel.php'; 
require_once 'ApiView.php';
require_once 'ApiController.php';

class ApiCommentController extends ApiController{

    function __construct(){
        parent::__construct();
        $this->model = new CommentModel();
        $this->view = new ApiView();
    }

    function getAllComentarios($params = null){
        $comentarios = $this->model->getAllComentarios();
        $this->view->response($comentarios, 200);
    }

    function getComentario($params = null){
        $id = $params[':ID'];
        $comentario = $this->model->getComentario($id);

        if(!empty($comentario)){
            $this->view->response($comentario, 200);
        }else{
            $this->view->response("La tarea con el id $id no existe", 404);
        }
    }

    function eliminarComentario($params = null){
        $id = $params[':ID'];
        $result = $comentario = $this->model->eliminarComentario($id);

        if($result > 0){
            $this->view->response("El comentario con el id=$id fue eliminado", 200);
        }else{
            $this->view->response("El comentario con el id=$id no existe", 404);
        }
            
    }

    function agregarComentario($params = null){
        $body = $this->getData(); //Lo que me viene de la API por el body del request

        $idComentario = $this->model->agregarComentario($body->contenido, $body->puntaje, $body->id_serie, $body->id_usuario);
        
        if(!empty($idComentario)){ //Verifica si el comentario existe
            $this->view->response($this->model->getComentario($idComentario), 201);
        }else{
            $this->view->response("La tarea no se pudo insertar", 404);
        }
    }

    function editarComentario($params = null){
        $comentario_id = $params[':ID'];
        $body = $this->getData();

        $comentario = $this->model->getComentario($comentario_id);
        if(empty($comentario)){
            $this->view->response("El comentario con el id=$id no existe", 404);
        }else{
            $result = $this->model->editarComentario($comentario_id ,$body->contenido, $body->puntaje, $body->id_serie, $body->id_usuario);
            if($result>0){
                $this->view->response($this->model->getComentario($comentario_id), 200);
            }else{
                $this->view->response("El comentario con el id=$comentario_id no fue actualizado", 204);
            }
        }
    }

}