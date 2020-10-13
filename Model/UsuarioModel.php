<?php

//Creo la clase
class UsuarioModel {

    //Conexion a la base de datos
    function GetDBConnection(){
        return  new PDO('mysql:host=localhost;'.'dbname=db_series;charset=utf8', 'root', '');
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

}