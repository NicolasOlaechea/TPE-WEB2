<!DOCTYPE html>
<html lang="en">
    
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Home</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <!-- Header, contiene: 
        -un logo
        -BARRA DE NAVEGACION-->
    <header class="header">
        <a href="index.html"><img class="logoPagina" src="images/logoPagina.png" alt="Logo Pagina"></a>
        <img id="menuLogo" src="images/menu-logo.png" alt="Menu-logo" class="menuLogo">
        <div class="divBuscarSerie">
                        <form action="buscar" method="GET" class="formBuscarSerie">     
                            <input type="text" name="busqueda" placeholder="Buscar por nombre, genero o director">
                            <input class="btnBuscar" id="btnBuscar" type="submit" value="Buscar">
                        </form>
        </div>
        <nav>
            <ul id="barraNav" class="barraNavegacion">
                <a href="home"><li>Inicio</li></a>
                <a href="peliculas"><li>Peliculas</li></a>
                <a href="series"><li>Series</li></a>
                <a href="registro"><li>Registro</li></a>
                <a href="login"><li>Login</li></a>
                <a href="logout"><li>Logout</li></a>
            </ul>
        </nav>
    </header>