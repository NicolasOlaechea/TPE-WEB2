<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-04 06:41:33
  from 'C:\xampp\htdocs\TPE\templates\series.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f79527dc5ad86_27185584',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ec9e218e974245141787cf7e80611cfe2e4cadf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\series.tpl',
      1 => 1601262828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f79527dc5ad86_27185584 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<main class="contenido">
        <section class="seccionesPeliculasSeries">
            <article class="seccion">
                <h1 class="tituloSecciones">Series - Estrenos 2020</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/series/dracula.jpg" alt="Dracula">
                    <img src="images/series/feelGood.jpg" alt="Feel good">
                    <img src="images/series/laCasaDePapel.jpg" alt="La casa de papel">
                    <img src="images/series/lockeYkey.jpg" alt="Locke y Key">
                    <img src="images/series/ragnarok.jpg" alt="Ragnarok">
                    <img src="images/series/messiah.jpg" alt="Messiah">
                </div>
            </article>

            <article class="seccion">
                <h1 class="tituloSecciones">Series - Proximos estrenos</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/series/theEddy.jpg" alt="The Eddy">
                    <img src="images/series/falconYwinterSoldier.jpg" alt="Falcon y Winter Soldier">
                    <img src="images/series/snowpiercer.jpg" alt="Snowpiercer">
                    <img src="images/series/betaal.jpg" alt="Betaal">
                    <img src="images/series/colony.jpg" alt="Colony">
                    <img src="images/series/spaceForce.jpg" alt="legacies">
                </div>
            </article>

            <article class="seccion">
                <h1 class="tituloSecciones">Series - Destacadas</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/series/chernobyl.jpg" alt="Chernobyl">
                    <img src="images/series/thepolitician.jpg" alt="The politician">
                    <img src="images/series/watchmen.jpg" alt="Watchmen">
                    <img src="images/series/apache.jpg" alt="Apache">
                    <img src="images/series/thewitcher.jpg" alt="The witcher">
                    <img src="images/series/viasavis.jpg" alt="Vis a vis">
                </div>
            </article>

            <article class="seccion">
                <h1 class="tituloSecciones">Series - Recomendadas</h1>
                <div class="portadasPeliculasSeries">
                    <img src="images/series/theboys.jpg" alt="The boys">
                    <img src="images/series/elite.jpeg" alt="Elite">
                    <img src="images/series/punisher.jpeg" alt="Punisher">
                    <img src="images/series/theLastDance.jpg" alt="The last dance">
                    <img src="images/series/flash.jpg" alt="Flash">
                    <img src="images/series/vikings.jpg" alt="Vikings">
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
