<?php
//Incluyo lel archivo
require_once('./libs/smarty/Smarty.class.php');

//Creo la clase
class UsuarioView {

    function showLogin($mensaje = ""){
        $smarty = new Smarty();
        $smarty->assign('mensaje', $mensaje);
        $smarty->display('templates/login.tpl'); // muestro el template   
    }
}