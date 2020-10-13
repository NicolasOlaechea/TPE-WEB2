<?php

//Creo la clase
class DirectorModel {

    //Conexion a la base de datos
    function GetDBConnection(){
        return  new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    //Obtengo todos los directores de la base de datos
    function getAllDirectores(){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM director");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //Agrego un director a la base de datos
    function agregarDirector($nombre, $edad, $nacionalidad){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("INSERT INTO director(nombre, edad, nacionalidad) VALUES(?,?,?)");
        $sentencia->execute(array($nombre, $edad, $nacionalidad));

        header("Location: ".BASE_URL."directores");
    }

    //Elimino un director de la base de datos
    function eliminarDirector($director){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("DELETE FROM director WHERE id=?");
        $sentencia->execute(array($director));
        
        header("Location: ". BASE_URL . "directores");
    }

    //Edito un director de la base de datos
    function editarDirector($director_id, $nombre, $edad, $nacionalidad){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("UPDATE director SET nombre=?, edad=?, nacionalidad=? WHERE id=?");
        $sentencia->execute(array($nombre, $edad, $nacionalidad, $director_id));
        
        header("Location: ". BASE_URL . "home");
    }

    //Obtengo una director por el id
    function getDirector($id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM director WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
        
        header("Location: ". BASE_URL . "home");
    }
    
}