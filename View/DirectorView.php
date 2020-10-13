<?php
//Incluyo lel archivo
require_once('./libs/smarty/Smarty.class.php');

//Creo la clase
class DirectorView {

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
        $smarty = new Smarty();
        $smarty->assign('director', $director);
        $smarty->display('templates/editarDirector.tpl'); // muestro el template 
    }

}