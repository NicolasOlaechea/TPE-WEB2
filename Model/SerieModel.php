<?php

class SerieModel {

    //Conexion a la base de datos
    function GetDBConnection(){
        return  new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    //Obtengo todas las series de la base de datos
    function getAllSeries(){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM serie");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Agrego una serie a la base de datos
    function agregarSerie($nombre, $genero, $idDirector){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("INSERT INTO serie(nombre, genero, id_director) VALUES(?,?,?)");
        $sentencia->execute(array($nombre, $genero, $idDirector));
    
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
    function editarSerie($serie_id, $nombre, $genero, $idDirector){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("UPDATE serie SET nombre=?, genero=?, id_director=? WHERE id=?");
        $sentencia->execute(array($nombre, $genero, $idDirector, $serie_id));
        
        header("Location: ". BASE_URL . "home");
    }

    //Obtengo una serie por el id
    function getSerie($id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM serie WHERE id=?");
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

}