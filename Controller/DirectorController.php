<?php
//Incluyo los archivos
require_once './Model/SerieModel.php';
require_once './Model/DirectorModel.php';
require_once './Model/UsuarioModel.php';
require_once './View/DirectorView.php';
require_once './Helper/AutenticacionHelper.php';

//Creo la clase
class DirectorController{
    //Atributos
    private $serieModel;
    private $directorModel;
    private $usuarioModel;
    private $controllerView;
    private $autenticacionHelper;

    //Creo el constructor
    public function __construct(){
        $this->serieModel = new SerieModel();
        $this->directorModel = new DirectorModel();
        $this->usuarioModel = new UsuarioModel();
        $this->directorView = new DirectorView();
        $this->autenticacionHelper = new AutenticacionHelper();
    }

    //DIRECTORES (CATEGORIA)-----------------------------------------------------------

    //Muestro los directores
    function mostrarDirectores(){
        //$this->checkLoggedIn();
        //Le pido al model todos los directores
        $directores = $this->directorModel->getAllDirectores();
        $usuarioLogueado = $this->autenticacionHelper->usuarioLogueado();

        //Le digo al view que muestre todos los directores
        $this->directorView->showDirectores($directores, $usuarioLogueado);
    }

    //Agrego un director
    function agregarDirector(){
        //Le pido al model todos los directores
        $directores = $this->directorModel->getAllDirectores();

        //Guardo todos los datos que ingreso el usuario
        if(isset($_POST["nombre"]) && isset($_POST["edad"]) && isset($_POST["nacionalidad"])){
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            $nacionalidad = $_POST["nacionalidad"];
        }

        //Verifico si ya existia el director que ingresaron
        $esta = false;
        foreach($directores as $director){
            if($director->nombre == $nombre){
                $esta = true;
            }
        }

        //Si el director que ingresaron no estaba le digo al model que lo agregue
        if($esta == false){
            $this->directorModel->agregarDirector($nombre, $edad, $nacionalidad);
        }
        
    }

    //Eliminar director
    function eliminarDirector($params = null){
        $this->autenticacionHelper->checkLoggedIn();
        //Guardo el id que recibo por parametros
        $id_director = $params[':ID'];

        //Le digo al model que elimine el director con el id anterior
        $this->directorModel->eliminarDirector($id_director);
    }

    //Edito un director
    function editarDirector($params = null){
        $this->autenticacionHelper->checkLoggedIn();
        //Obtengo el id que recibo por parametro
        $director_id = $params[':ID'];

        //Guardo todos los datos que ingreso el usuario para editar el director
        if(isset($_POST["nombre"]) && isset($_POST["edad"]) && isset($_POST["nacionalidad"])){
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            $nacionalidad = $_POST["nacionalidad"];
        }

        //Le digo al model que edite el director con los datos anteriores
        $this->directorModel->editarDirector($director_id, $nombre, $edad, $nacionalidad);
        header("Location: ". BASE_URL . "directores");
    }

    //Muestro series por director
    function mostrarSeriesPorDirector($params=null){
        //Le pido al model todos los directores
        $directores = $this->directorModel->getAllDirectores();
        
        //Guardo el nombre del director que ingresa el usuario
        if(isset($_POST["director"])){
            $nombreDirector = $_POST["director"];
        }

        //Recorro todos los directores y guardo el id del director que coincida
        //con el nombre que ingreso el usuario
        foreach($directores as $director){
            if($director->nombre == $nombreDirector){
                $id_director = $director->id;
                $nombreDirector = $director->nombre;
            }
        }
        
        //Le pido al model todas las series que tengan al director que ingreso
        //el usuario
        $series = $this->serieModel->getSeriesPorDirector($id_director);
        
        //Le digo al view que muestre las series
        $this->directorView->showSeriesPorDirector($series, $nombreDirector);
    }

    function mostrarFormEditarDirector($params = null){
        //Guardo el id que recibo por parametros
        $idDirector = $params[':ID'];

        //Le pido al model el director con el id anterior
        $director = $this->directorModel->getDirector($idDirector);

        //Le digo al view que muestre el form de editar director
        $this->directorView->formEditarDirector($director);
    }

}