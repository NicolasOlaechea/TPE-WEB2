{include file="header.tpl"} <!--Incluyo el header-->

{if $usuarioLogueado != null && $usuarioLogueado->rol == "administrador"}
<div class="div-usuarios-admin">
    <a href="usuarios">Administrar usuarios</a>
</div>
{/if}

<main class="contenido">
        <section class="seccionesPeliculasSeries">
            <article class="seccion">
                <h1 class="tituloSecciones">Peliculas - proximos estrenos</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/peliculas/rapidosYfuriosos9.jpg" alt="Rapidos y furiosos 9">
                    <img src="images/peliculas/bond25.jpg" alt="Bond 25">
                    <img src="images/peliculas/espiral.jpg" alt="Espiral">
                    <img src="images/peliculas/estacionZombie2.jpg" alt="Estacion zombie 2">
                    <img src="images/peliculas/elConjuro3.jpg" alt="El conjuro 3">
                    <img src="images/peliculas/halloweenEnds.jpg" alt="Halloween Ends">
                </div>
            </article>

            <article class="seccion">
                <h1 class="tituloSecciones">Series - proximos estrenos</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/series/theEddy.jpg" alt="The Eddy">
                    <img src="images/series/falconYwinterSoldier.jpg" alt="Falcon y Winter Soldier">
                    <img src="images/series/snowpiercer.jpg" alt="Snowpiercer">
                    <img src="images/series/betaal.jpg" alt="Betaal">
                    <img src="images/series/colony.jpg" alt="Colony">
                    <img src="images/series/spaceForce.jpg" alt="legacies">
                </div>
            </article>
        </section>
        
        <aside class="publicidad">
            <a target="blank" class="link" href="https://www.cocacoladeargentina.com.ar/"><img src="images/pubicidad/cocaCola.jpg" alt="Coca-Cola"></a>
            <a target="blank" class="link" href="https://lays.es/"><img src="images/pubicidad/lays.jpg" alt="Lays"></a>
            <a target="blank" class="link" href="https://www.mcdonalds.com.ar/"><img src="images/pubicidad/mcdonalds.jpg" alt="MCDonalds"></a>
        </aside>
    </main>

    <!--div estadisticas, contiene:
    -titulo
    -TABLA con las estadisticas del año 2020-->
    <aside class="estadisticas">
        <h2 class="tituloSecciones">Las mas elegidas en el 2020</h2>
        <div class="divTabla">
            <table class="tablaEstadisticas">
                <thead>
                    <tr>
                        <th></th>
                        <th>Serie</th>
                        <th>Genero</th>
                        <th>Director</th>
                    </tr>
                </thead>
                <tbody id="bodyTabla">
                    {foreach from=$series item=serie}
                        <tr>
                            <td>
                                {if $serie->imagen != null}
                                    <img src="images/series/{$serie->imagen}" class="imgTablaSeries">
                                {/if}
                            </td>
                            <td>{$serie->nombre_serie}</td>
                            <td>{$serie->genero}</td>
                            <td>{$serie->nombre_director}</td>
                            {if $usuarioLogueado != null && $usuarioLogueado->rol == "administrador"}
                                <td><button class="btnEliminar"><a href="eliminar/{$serie->id}">Eliminar</a></button></td>
                                <td><button class="btnEditar"><a href="editar/{$serie->id}">Editar</a></button></td>
                            {/if}    
                            <td><a class="btnVerMas" href="verSerie/{$serie->id}">Ver Mas</a></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
        <div class="div-navegacion">
            <nav class="nav-paginacion">
                <ul class="paginacion">
                    {if $pagina>1}
                        <li class="page-item-action" disabled><a disabled class="page-link" href="home/{$pagina-1}">Atras</a></li>
                    {/if}
                        {for $i=1 to $cantPaginas}
                            <li class="page-item {if $i==$pagina}seleccionado{/if}"><a class="page-link" href="home/{$i}">{$i}</a></li>
                        {/for}
                    {if $pagina<4}
                        <li class="page-item-action"><a class="page-link" href="home/{$pagina+1}">Siguiente</a></li>
                    {/if}
                </ul>
            </nav>
        </div>

    {if $usuarioLogueado != null && $usuarioLogueado->rol == "administrador"}
        <div>
            <form action="agregar" method="POST" class="formTabla2019" enctype="multipart/form-data">
                <h2>¡Agregar tu serie favorita a la tabla!</h2>        
                <input type="text" name="serie" placeholder="Serie">
                <input type="text" name="genero" placeholder="Genero">
                <select name="director" id="director">
                    <option>Director</option>
                    {foreach from=$directores item=director}
                        <option value="{$director->nombre_director}">{$director->nombre_director}</option>
                    {/foreach}
                </select>
                {if $usuarioLogueado->rol == "administrador"}
                    <input type="file" name="img">
                {/if}
                <input id="btnAgregar" type="submit" value="Agregar">
            </form>
        </div>
    {/if}
    
        <div id="divLinkDirectores">
            <a href="directores" id="botonVerDirectores">Ver Directores</a>
        </div>
    </aside>

{include file="footer.tpl"} <!--Incluyo el footer-->