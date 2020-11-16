<?php
//Incluyo lel archivo
require_once('./libs/smarty/Smarty.class.php');
require_once './Helper/AutenticacionHelper.php';

//Creo la clase
class SerieView {

    //Atributos
    private $autenticacionHelper;

    //Creo el constructor
    public function __construct(){
        $this->autenticacionHelper = new AutenticacionHelper();
    }

    //Muestro el home
    function showHome($series, $directores, $usuarioLogueado){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->assign('series', $series);
        $smarty->assign('directores', $directores);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/home.tpl'); // muestro el template   
    }

    //Muestro la seccion peliculas
    function showPeliculas(){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->display('templates/peliculas.tpl'); // muestro el template
    }

    //Muestro la seccion series
    function showSeries(){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->display('templates/series.tpl'); // muestro el template
    }
        
    //Muestro la seccion registro
    function showRegistro(){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->display('templates/registro.tpl'); // muestro el template
    }

    //Muestro los datos de una serie
    function showSerie($serie, $puntajesDisponibles){
        $smarty = new Smarty();
        $smarty->assign('serie', $serie);
        $smarty->assign('puntajes', $puntajesDisponibles);
        $smarty->display('templates/serie.tpl'); // muestro el template 
    }

    //Muestro el form de editar serie
    function formEditar($serie, $directores){
        $this->autenticacionHelper->checkLoggedIn();
        $smarty = new Smarty();
        $smarty->assign('serie', $serie);
        $smarty->assign('directores', $directores);
        $smarty->display('templates/editar.tpl'); // muestro el template 
    }
    
}