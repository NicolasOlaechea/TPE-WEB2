<?php
//Incluyo los archivos
require_once './Model/SerieModel.php';
require_once './Model/DirectorModel.php';
require_once './Model/UsuarioModel.php';
require_once './View/SerieView.php';
require_once './Helper/AutenticacionHelper.php';

//Creo la clase
class SerieController{
    //Atributos
    private $serieModel;
    private $directorModel;
    private $usuarioModel;
    private $view;
    private $autenticacionHelper;

    //Creo el constructor
    public function __construct(){
        $this->serieModel = new SerieModel();
        $this->directorModel = new DirectorModel();
        $this->usuarioModel = new UsuarioModel();
        $this->view = new SerieView();
        $this->autenticacionHelper = new AutenticacionHelper();
    }

    //Muestro el home
    function mostrarHome($params = null){
        if($params){
            $pagina = $params[':ID']; //Guardo el numero de pagina
        }
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        $series = $this->serieModel->getAllSeries();
        $directores = $this->directorModel->getAllDirectores();
    
        //Guardo la cantidad de elementos por pagina y la cantidad de paginas que necesito
        $elementosPorPagina = 3;
        $cantPaginas = ceil(count($series)/$elementosPorPagina); //Redondea hacia arriba
        //Si no existe params, es menor a 1, mayor a cantPaginas o viene vacio: pagina = 1
        if((!$params) || ($params[':ID'] <1) || ($params[':ID'] > $cantPaginas) || empty($params)){
            $pagina = 1;
        }

        //Calculo el inicio y obtengo las series entre los limites que le paso
        //(1-1)*3 = 0 -> traigo del 0 al 3
        //(2-1)*3 = 3 -> traigo del 3 al 6...
        $inicio = ($pagina-1)*$elementosPorPagina; 
        $seriesPorLimite = $this->serieModel->getSeriesPorLimite($inicio, 3);
        $this->view->showHome($seriesPorLimite, $directores, $usuarioLogueado, $cantPaginas, $pagina);
    }

    //Muestro la seccion de peliculas
    function mostrarPeliculas(){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        $this->view->showPeliculas($usuarioLogueado);
    }

    //Muestro la seccion de series
    function mostrarSeries(){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        $this->view->showSeries($usuarioLogueado);
    }

    //SERIES (ITEM)------------------------------------------------------------

    //Agrego una serie
    function agregarSerie(){
        //Obtengo todos los directores
        $directores = $this->directorModel->getAllDirectores();

        $destino = null; //44:00 lo explica
        if(isset($_FILES['img'])){
            //Concateno el directorio actual y la carpeta donde guardo las imagenes
            //'C:\xampp\htdocs\TPE/images/series'
            $uploads = getcwd() . "/images/series"; 

            //Creo un fichero con un nombre único dentro de "uploads"
            //'C:\xampp\htdocs\TPE\images\series\nombreUnico.tmp'
            $destino = tempnam($uploads, $_FILES['img']['name']);

            //Mueve un archivo subido a una nueva ubicación
            move_uploaded_file($_FILES['img']['tmp_name'], $destino);
            
            //Guardo el último componente de nombre de una ruta
            //'nombreUnico.tmp'
            $destino = basename($destino);
        }
        //Guardo los datos que ingresa el usuario
        if(isset($_POST["serie"]) && isset($_POST["genero"]) && isset($_POST["director"])){
            $nombre_serie = $_POST["serie"];
            $genero = $_POST["genero"];
            $nameDirector = $_POST["director"];
        }

        //Recorro los directores y guardo el id del director que coincida con
        //el nombre que ingreso el usuario
        foreach($directores as $director){
            if($nameDirector == $director->nombre_director){
                $idDirector = $director->id;
            }
        }

        //Le digo al modelo que agregue una serie con los datos anteriores
        $this->serieModel->agregarSerie($nombre_serie, $genero, $idDirector, $destino);
    }

    //Elimino una serie
    function eliminarSerie($params = null){
        $this->autenticacionHelper->checkLoggedIn();
        //Guardo el id que recibo por parametro y le digo al model que elimine
        $serie_id = $params[':ID'];
        $serie = $this->serieModel->getSerie($serie_id);
        
        unlink('images/series/'.$serie->imagen); //Elimino el .tmp del directorio
        $this->serieModel->eliminarSerie($serie_id);
    }

    //Edito una serie
    function editarSerie($params = null){
        $this->autenticacionHelper->checkLoggedIn();
        //Obtengo todos los directores y el id que recibo por parametro
        $directores = $this->directorModel->getAllDirectores();
        $serie_id = $params[':ID'];
        $serie = $this->serieModel->getSerie($serie_id);
        //Elimino el .tmp del directorio, asi no me quedan dos de la misma serie
        unlink('images/series/'.$serie->imagen); 

        $destino = null; 
        if(isset($_FILES['img'])){
            if($_FILES['img']['name'] != ''){ //Si ingresaron una imagen...
                $uploads = getcwd() . "/images/series";
                $destino = tempnam($uploads, $_FILES['img']['name']);
                move_uploaded_file($_FILES['img']['tmp_name'], $destino);
                $destino = basename($destino);
            }
            
            //Si no ingresaron una imagen le mando null y la serie queda sin imagen
            if($_FILES['img']['name'] == ''){
                $destino = null;
            }
        }
        
        //Guardo todos los datos que ingreso el usuario para editar la serie
        if(isset($_POST["serie"]) && isset($_POST["genero"]) && isset($_POST["director"])){
            $nombre = $_POST["serie"];
            $genero = $_POST["genero"];
            $nameDirector = $_POST["director"];
        }

        //Recorro los directores y guardo el id del director que coincida con el
        //nombre que ingreso el usuario
        foreach($directores as $director){
            if($nameDirector == $director->nombre_director){
                $idDirector = $director->id;
            }
        }
        
        $this->serieModel->editarSerie($serie_id, $nombre, $genero, $idDirector, $destino);  
    }

    //Muestro una serie por el ID
    function mostrarSerie($params=null){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();

        //Guardo el id que recibo por parametro
        $serie_id = $params[':ID'];

        //Le digo al model que me de la serie que coincida con el id anterior
        $serie = $this->serieModel->getSerie($serie_id);
        //Creo un arreglo con los puntajes disponibles (de 1 a 5)
        $puntajesDisponibles = [];
        for($i=1; $i<=5; $i++){
            array_push($puntajesDisponibles, $i);
        }
        
        //Le digo al view que muestre la serie
        $this->view->showSerie($serie, $puntajesDisponibles, $usuarioLogueado);
    }

    //Muestro el form de editar serie
    function mostrarFormEditar($params = null){
        //Guardo el id que recibo por parametros
        $idSerie = $params[':ID'];
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        
        //Le pido al model la serie con el id anterior y todos los directores
        $serie = $this->serieModel->getSerie($idSerie);
        $directores = $this->directorModel->getAllDirectores();

        //Le digo al view que muestre el form de editar
        $this->view->formEditar($serie, $directores, $usuarioLogueado);
    }

    //Busqueda avanzada de series por alguno de sus atributos
    function busquedaSerie($params = null){
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();
        if(isset($_GET["busqueda"])){
            $busqueda = $_GET["busqueda"];
        }
        $series = $this->serieModel->getSeriesPorBusqueda($busqueda);
        $this->view->mostrarBusqueda($series, $usuarioLogueado);
    }

    function eliminarImagen($params = null){
        $idSerie = $params[":ID"];
        $imagen = null;
        $serie = $this->serieModel->getSerie($idSerie);
        unlink('images/series/'.$serie->imagen); //Elimino el .tmp del directorio
        $this->serieModel->eliminarImagen($imagen, $idSerie);
    }
}