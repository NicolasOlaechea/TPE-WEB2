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
    function showHome($series, $directores, $usuarioLogueado, $cantPaginas, $pagina){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->assign('series', $series);
        $smarty->assign('directores', $directores);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->assign('cantPaginas', $cantPaginas);
        $smarty->assign('pagina', $pagina);
        $smarty->display('templates/home.tpl'); // muestro el template   
    }

    //Muestro la seccion peliculas
    function showPeliculas($usuarioLogueado){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/peliculas.tpl'); // muestro el template
    }

    //Muestro la seccion series
    function showSeries($usuarioLogueado){
        // inicializo Smarty y asigno las variables para mostrar
        $smarty = new Smarty();
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/series.tpl'); // muestro el template
    }

    //Muestro los datos de una serie
    function showSerie($serie, $puntajesDisponibles, $usuarioLogueado){
        $smarty = new Smarty();
        $smarty->assign('serie', $serie);
        $smarty->assign('puntajes', $puntajesDisponibles);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/serie.tpl'); // muestro el template 
    }

    //Muestro el form de editar serie
    function formEditar($serie, $directores, $usuarioLogueado){
        $this->autenticacionHelper->checkLoggedIn();
        $smarty = new Smarty();
        $smarty->assign('serie', $serie);
        $smarty->assign('directores', $directores);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/editar.tpl'); // muestro el template 
    }
    
    function mostrarBusqueda($series, $usuarioLogueado){
        $smarty = new Smarty();
        $smarty->assign('series', $series);
        $smarty->assign('usuarioLogueado', $usuarioLogueado);
        $smarty->display('templates/busquedaSerie.tpl');
    }
}