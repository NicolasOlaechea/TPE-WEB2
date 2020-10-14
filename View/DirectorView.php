<?php
//Incluyo lel archivo
require_once('./libs/smarty/Smarty.class.php');
require_once './Helper/AutenticacionHelper.php';

//Creo la clase
class DirectorView {

    //Atributos
    private $autenticacionHelper;

    //Creo el constructor
    public function __construct(){
        $this->autenticacionHelper = new AutenticacionHelper();
    }

    //Muestro la seccion de directores (categoria)
    function showDirectores($directores, $usuarioLogueado){
        $smarty = new Smarty();
        $smarty->assign('directores', $directores);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/directores.tpl'); // muestro el template 
    }

    //Muestro lista de series de un director
    function showSeriesPorDirector($series, $nombreDirector){
        $smarty = new Smarty();
        $smarty->assign('series', $series);
        $smarty->assign('nombreDirector', $nombreDirector);
        $smarty->display('templates/seriesPorDirector.tpl'); // muestro el template 
    }

    //Muestro el form de editar director
    function formEditarDirector($director){
        $this->autenticacionHelper->checkLoggedIn();
        $smarty = new Smarty();
        $smarty->assign('director', $director);
        $smarty->display('templates/editarDirector.tpl'); // muestro el template 
    }

}