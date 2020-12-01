<?php
//Incluyo los archivos
require_once './Model/UsuarioModel.php';
require_once './View/UsuarioView.php';
require_once './Helper/AutenticacionHelper.php';

//Creo la clase
class UsuarioController{
    //Atributos
    private $usuarioModel;
    private $usuarioView;
    private $autenticacionHelper;

    //Creo el constructor
    public function __construct(){
        $this->usuarioModel = new UsuarioModel();
        $this->usuarioView = new UsuarioView();
        $this->autenticacionHelper = new AutenticacionHelper();
    }

    //Agrego usuario
    function agregarUsuario(){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        
        $existe = false;
        $usuarios = $this->usuarioModel->getUsuarios();
  
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
        }
        
        foreach($usuarios as $usuario){
            if($usuario->email == $email){
                $existe = true;
            }
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        if($existe == false){
            $this->usuarioModel->agregarUsuario($email, $hash);
            $this->verificarUsuario();    
        }else{
            $this->usuarioView->showRegistro("Ya existe un usuario con el mismo email", $usuarioLogueado);
        }
        
    }

    
    //Muestro la seccion del registro
    function mostrarRegistro(){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        $this->usuarioView->showRegistro("", $usuarioLogueado);
    }

    //Muestro el login
    function showLogin(){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        $this->usuarioView->showLogin("", $usuarioLogueado);
    }

    //Verifico el usuario ingresado
    function verificarUsuario(){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        //Guardo los datos que ingresa el usuario
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
        }
        //Le pido al model el usuario con el email ingresado
        $usuario = $this->usuarioModel->getUsuario($email);
        if(isset($usuario) && $usuario){ //Si existe el usuario...
            if(password_verify($password, $usuario->password)){ //Verifico la contraseña
                session_start();
                $_SESSION["EMAIL"] = $usuario->email;
                $_SESSION['LAST_ACTIVITY'] = time();
                
                header("Location: ". BASE_URL . "home");
            }else{
                $this->usuarioView->showLogin("Contraseña incorrecta", $usuarioLogueado);
            }
        }else{
            // No existe el user en la DB
            $this->usuarioView->showLogin("El usuario no existe", $usuarioLogueado);
        }
    }

    //Cierro la sesion
    function Logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);
    }

    function mostrarUsuarios(){
        $usuarios = $this->usuarioModel->getUsuarios();
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        $this->usuarioView->showUsuarios($usuarios, $usuarioLogueado);
    }

    function cambiarRol($params = null){
        $idUsuario = $params[":ID"];
        $usuario = $this->usuarioModel->getUsuarioPorID($idUsuario);
        $rol = null;
        if($usuario->rol == "administrador"){
            $rol = null;
        }else{
            $rol = "administrador";
        }
        $this->usuarioModel->cambiarRol($idUsuario, $rol);
        header("Location: ".USUARIOS);
    }

    function eliminarUsuario($params = null){
        $idUsuario = $params[":ID"];
        $this->usuarioModel->eliminarUsuario($idUsuario);
        header("Location: ".USUARIOS);
    }
}