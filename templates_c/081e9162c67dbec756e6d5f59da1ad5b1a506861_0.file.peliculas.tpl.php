<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-04 06:41:29
  from 'C:\xampp\htdocs\TPE\templates\peliculas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f795279c81e30_07520241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '081e9162c67dbec756e6d5f59da1ad5b1a506861' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\peliculas.tpl',
      1 => 1601262844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f795279c81e30_07520241 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<main class="contenido">
        
        <section class="seccionesPeliculasSeries">
            <article class="seccion">
                <h1 class="tituloSecciones">Peliculas - Estrenos 2020</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/peliculas/elHombreInvisible.jpg" alt="El hombre invisible">
                    <img src="images/peliculas/mulanjpeg.jpeg" alt="Mulan">
                    <img src="images/peliculas/elRoboDelSiglo.jpg" alt="El robo del siglo">
                    <img src="images/peliculas/bloodShot.jpg" alt="Bloofshot">
                    <img src="images/peliculas/unLugarEnSilencio.jpg" alt="Un lugar en silencio">
                    <img src="images/peliculas/sonicLaPelicula.jpg" alt="Sonic la pelicula">
                </div>
            </article>

            <article class="seccion">
                <h1 class="tituloSecciones">Peliculas - Proximos estrenos</h1>
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
                <h1 class="tituloSecciones">Peliculas - Destacadas</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/peliculas/avengers.jpg" alt="Avengers">
                    <img src="images/peliculas/toyStory4.jpg" alt="Toy Story 4">
                    <img src="images/peliculas/joker.jpg" alt="Joker">
                    <img src="images/peliculas/milagroEnLaCelda7.jpg" alt="Milagro En La Celda 7">
                    <img src="images/peliculas/elIrlandes.jpg" alt="El irlandes">
                    <img src="images/peliculas/parasite.jpg" alt="Parasite">
                </div>
            </article>

            <article class="seccion">
                <h1 class="tituloSecciones">Peliculas - Recomendadas</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/peliculas/enBuscaDeLaFelicidad.jpg" alt="En busca de la felicidad">
                    <img src="images/peliculas/starWars.jpg" alt="starWars">
                    <img src="images/peliculas/contraLoImposible.jpg" alt="Contra lo imposible">
                    <img src="images/peliculas/elHoyo.jpg" alt="El hoyo">
                    <img src="images/peliculas/it.jpg" alt="It">
                    <img src="images/peliculas/glass.jpg" alt="Glass">
                </div>
            </article>
        </section>

        <aside class="generos">
            <h2 class="tituloSecciones">Generos</h2>
            <ol class="listaGeneros">
                <li>Accion</li>
                <li>Animacion</li>
                <li>Aventura</li>
                <li>Ciencia Ficcion</li>
                <li>Clasicas</li>
                <li>Comedia</li>
                <li>DC Comics</li>
                <li>Deportes</li>
                <li>Disney</li>
                <li>Documental</li>
                <li>Drama</li>
                <li>Historia</li>
                <li>Humor</li>
                <li>Horror</li>
                <li>Infantil</li>
                <li>Misterio</li>
                <li>Musica</li>
                <li>Policial</li>
                <li>Romance</li>
                <li>Sobrenatural</li>
                <li>Superheroes</li>
                <li>Suspenso</li>
                <li>Terror</li>
                <li>Zombie</li>
            </ol>
        </aside>

    </main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
