<?php
require_once './Model/DirectorModel.php';
require_once './Model/UsuarioModel.php';

class AutenticacionHelper{

    private $directorModel;
    private $usuarioModel;

    public function __construct(){
        $this->directorModel = new DirectorModel();
        $this->usuarioModel = new UsuarioModel();
    }

    //Obtengo el usuario que esta logueado actualmente
    function usuarioLogueado(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        
        if(isset($_SESSION['EMAIL'])){
            $email = $_SESSION['EMAIL'];
            $usuarioActual = $this->usuarioModel->getUsuario($email);
            return $usuarioActual;
        }else {
            return null;
        }
    }
    
    function checkLoggedIn(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        
        if(!isset($_SESSION["EMAIL"])){
            header("Location: ". LOGIN);
            die();
        }else{
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 100000)) { 
                header("Location: ". LOGOUT);
                die();
            } 
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
}

?>
