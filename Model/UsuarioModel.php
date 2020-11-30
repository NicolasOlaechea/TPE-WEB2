<?php

//Creo la clase
class UsuarioModel {

    //Conexion a la base de datos
    function GetDBConnection(){
        return  new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
    }

    function getUsuarios(){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM `usuario`");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //Agrego un usuario a la base de datos
    function agregarUsuario($email, $passwordHash){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("INSERT INTO usuario(email, password) VALUES(?,?)");
        $sentencia->execute(array($email, $passwordHash));

        header("Location: ".BASE_URL."home");
    }

    //Obtengo un usuario por el email
    function getUsuario($email){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM usuario WHERE email=?");
        $sentencia->execute(array($email));
        return $sentencia->fetch(PDO::FETCH_OBJ);
        
    }

    //Obtengo un usuario por el ID
    function getUsuarioPorID($id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("SELECT * FROM usuario WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
        
    }

    //Cambio el rol de un usuario
    function cambiarRol($id, $rol){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("UPDATE usuario SET rol=? WHERE id=?");
        $sentencia->execute(array($rol, $id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
        header("Location: ".BASE_URL."usuarios");
    }

    function eliminarUsuario($id){
        $db = $this->GetDBConnection();
        $sentencia = $db->prepare("DELETE FROM usuario WHERE id=? ON DELETE CASCADE");
        $sentencia->execute(array($id));
        
        header("Location: ". BASE_URL . "usuarios");
    }
}