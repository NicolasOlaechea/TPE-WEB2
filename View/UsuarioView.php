<?php
//Incluyo lel archivo
require_once('./libs/smarty/Smarty.class.php');

//Creo la clase
class UsuarioView {

    function showLogin($mensaje = "", $usuarioLogueado){
        $smarty = new Smarty();
        $smarty->assign('mensaje', $mensaje);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/login.tpl'); // muestro el template   
    }

    //Muestro la seccion registro
    function showRegistro($mensaje = "", $usuarioLogueado){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->assign('mensaje', $mensaje);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/registro.tpl'); // muestro el template
    }

    function showUsuarios($usuarios, $usuarioLogueado){
        $smarty = new Smarty();
        $smarty->assign('usuarios', $usuarios);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/usuarios.tpl');
    }
}