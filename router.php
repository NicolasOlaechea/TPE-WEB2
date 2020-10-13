<?php
    //Incluyo los archivos
    require_once 'Controller/SerieController.php';
    require_once 'Controller/DirectorController.php';
    require_once 'Controller/UsuarioController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
    
    $r = new Router();

    // RUTAS:
    //Home index
    $r->addRoute("home", "GET", "SerieController", "mostrarHome"); //HOME
    $r->addRoute("Home", "GET", "SerieController", "mostrarHome"); //HOME
    //Series: agregar, eliminar, editar, verSerie
    $r->addRoute("agregar", "POST", "SerieController", "agregarSerie"); //AGREGAR
    $r->addRoute("eliminar/:ID", "GET", "SerieController", "eliminarSerie"); //ELIMINAR
    $r->addRoute("editar/:ID", "GET", "SerieController", "mostrarFormEditar"); //FORM EDITAR SERIE
    $r->addRoute("completarEdicion/:ID", "POST", "SerieController", "editarSerie"); //COMPLETAR EDICION SERIE
    $r->addRoute("verSerie/:ID", "GET", "SerieController", "mostrarSerie"); //MOSTRAR DATOS SERIE POR ID
    //Directores: seriesPorDirector, directores, agregar, eliminar, editar
    $r->addRoute("seriesDirector", "POST", "DirectorController", "mostrarSeriesPorDirector");
    $r->addRoute("directores", "GET", "DirectorController", "mostrarDirectores"); 
    $r->addRoute("agregarDirector", "POST", "DirectorController", "agregarDirector");
    $r->addRoute("eliminarDirector/:ID", "GET", "DirectorController", "eliminarDirector");
    $r->addRoute("editarDirector/:ID", "GET", "DirectorController", "mostrarFormEditarDirector"); //FORM EDITAR
    $r->addRoute("completarEdicionDirector/:ID", "POST", "DirectorController", "editarDirector"); //EDITAR
    //Usuarios:
    $r->addRoute("agregarUsuario", "POST", "UsuarioController", "agregarUsuario");
    $r->addRoute("login", "GET", "UsuarioController", "showLogin");
    $r->addRoute("verificarUsuario", "POST", "UsuarioController", "verificarUsuario");
    $r->addRoute("logout", "GET", "UsuarioController", "Logout");
    //Peliculas index
    $r->addRoute("peliculas", "GET", "SerieController", "mostrarPeliculas");
    //Series index
    $r->addRoute("series", "GET", "SerieController", "mostrarSeries");
    //Registro index
    $r->addRoute("registro", "GET", "SerieController", "mostrarRegistro");

    //Ruta por defecto.
    $r->setDefaultRoute("SerieController", "mostrarHome");

    //Advance
    $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>