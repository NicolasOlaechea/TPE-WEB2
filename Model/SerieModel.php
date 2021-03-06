<?php

class SerieModel {

    //Conexion a la base de datos
    function GetDBConnection(){
        return  new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    //Obtengo todas las series de la base de datos
    function getAllSeries(){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT `serie`.`id`, `serie`.`nombre_serie`, `serie`.`genero`, `serie`.`imagen`, `serie`.`id_director`, `director`.`nombre_director`  FROM `serie` INNER JOIN `director` ON `serie`.`id_director` = `director`.`id` ORDER BY `serie`.`id`");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //Obtengo las series que esten entre el limite que le paso
    function getSeriesPorLimite($inicio, $cantidad){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT `serie`.`id`, `serie`.`nombre_serie`, `serie`.`genero`, `serie`.`imagen`, `serie`.`id_director`, `director`.`nombre_director`  FROM `serie` INNER JOIN `director` ON `serie`.`id_director` = `director`.`id` ORDER BY `serie`.`id` LIMIT $inicio, $cantidad");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Agrego una serie a la base de datos
    function agregarSerie($nombre_serie, $genero, $id_director, $imagen){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("INSERT INTO serie(nombre_serie, genero, id_director, imagen) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre_serie, $genero, $id_director, $imagen));
    
        header("Location: ".BASE_URL."home");
    }

    //Elimino una serie de la base de datos
    function eliminarSerie($serie){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("DELETE FROM serie WHERE id=?");
        $sentencia->execute(array($serie));
        
        header("Location: ". BASE_URL . "home");
    }

    //Edito una serie de la base de datos
    function editarSerie($serie_id, $nombre_serie, $genero, $id_director, $imagen){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("UPDATE serie SET nombre_serie=?, genero=?, imagen=?, id_director=? WHERE id=?");
        $sentencia->execute(array($nombre_serie, $genero, $imagen, $id_director, $serie_id));
        
        header("Location: ". BASE_URL . "home");
    }

    //Obtengo una serie por el id
    function getSerie($id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT `serie`.`id`, `serie`.`nombre_serie`, `serie`.`genero`, `serie`.`imagen`, `serie`.`id_director`, `director`.`nombre_director`  FROM `serie` INNER JOIN `director` ON `serie`.`id_director` = `director`.`id` WHERE `serie`.`id`=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    //Obtengo una serie por el director
    function getSeriesPorDirector($id_director){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM serie WHERE id_director=?");
        $sentencia->execute(array($id_director));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

        header("Location: ". BASE_URL . "home");
    }

    //Obtengo series por busqueda del usuario
    function getSeriesPorBusqueda($busqueda){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT `serie`.`id`, `serie`.`nombre_serie`, `serie`.`genero`, `serie`.`imagen`, `serie`.`id_director`, `director`.`nombre_director` FROM `serie` INNER JOIN `director` ON `serie`.`id_director` = `director`.`id` WHERE nombre_serie LIKE ? OR genero LIKE ? OR nombre_director LIKE ?");
        $sentencia->execute(["%".$busqueda."%", "%".$busqueda."%", "%".$busqueda."%"]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);

        header("Location: ". BASE_URL . "home");
    }

    //Eliminar imagen
    function eliminarImagen($imagen, $serie_id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("UPDATE `serie` SET imagen=? WHERE id=?");
        $sentencia->execute(array($imagen, $serie_id));

        header("Location: ". BASE_URL . "home");
    }
}