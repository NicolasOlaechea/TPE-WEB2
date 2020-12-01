<?php

class CommentModel{

    //Conexion a la base de datos
    function GetDBConnection(){
        return  new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    //Obtengo todos los comentarios de la base de datos
    function getAllComentarios(){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT `comentario`.`id`, `comentario`.`contenido`, `comentario`.`puntaje`, `comentario`.`id_serie`, `comentario`.`id_usuario`, `serie`.`nombre_serie`, `usuario`.`email` FROM `comentario` INNER JOIN `serie` ON `comentario`.`id_serie` = `serie`.`id` INNER JOIN `usuario` ON `comentario`.`id_usuario` = `usuario`.`id`  ORDER BY `comentario`.`id`");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Agrego un comentario a la base de datos
    function agregarComentario($contenido, $puntaje, $id_serie, $id_usuario){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("INSERT INTO comentario(contenido, puntaje, id_serie, id_usuario) VALUES(?,?,?,?)");
        $sentencia->execute(array($contenido, $puntaje, $id_serie, $id_usuario));
        return $db->lastInsertId();
    }

    //Elimino un comentario de la base de datos
    function eliminarComentario($id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("DELETE FROM comentario WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->rowCount();
    }

    //Edito una serie de la base de datos
    function editarComentario($comentario_id ,$contenido, $puntaje, $id_serie, $id_usuario){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("UPDATE comentario SET contenido=?, puntaje=?, id_serie=?, id_usuario=? WHERE id=?");
        $sentencia->execute(array($contenido, $puntaje, $id_serie, $id_usuario, $comentario_id));
        return $sentencia->rowCount();
    }

    //Obtengo un comentario por el id
    function getComentario($id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT `comentario`.`id`, `comentario`.`contenido`, `comentario`.`puntaje`, `comentario`.`id_serie`, `comentario`.`id_usuario`, `serie`.`nombre_serie`, `usuario`.`email` FROM `comentario` INNER JOIN `serie` ON `comentario`.`id_serie` = `serie`.`id` INNER JOIN `usuario` ON `comentario`.`id_usuario` = `usuario`.`id` WHERE `comentario`.`id`=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    //Obtengo comentarios por serie
    function getComentariosPorSerie($id_serie){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT `comentario`.`id`, `comentario`.`contenido`, `comentario`.`puntaje`, `comentario`.`id_serie`, `usuario`.`email` FROM comentario INNER JOIN `usuario` ON `comentario`.`id_usuario` = `usuario`.`id` WHERE id_serie=? ORDER BY `comentario`.`id`");
        $sentencia->execute(array($id_serie));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }



}