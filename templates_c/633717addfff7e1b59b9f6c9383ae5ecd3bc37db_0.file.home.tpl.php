<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-11 05:57:37
  from 'C:\xampp\htdocs\TPE\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8282b1ac3080_42407709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '633717addfff7e1b59b9f6c9383ae5ecd3bc37db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\home.tpl',
      1 => 1602388608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f8282b1ac3080_42407709 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

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
                    <th>Serie</th>
                    <th>Genero</th>
                    <th>Director</th>
                </tr>
            </thead>
            <tbody id="bodyTabla">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['series']->value, 'serie');
$_smarty_tpl->tpl_vars['serie']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['serie']->value) {
$_smarty_tpl->tpl_vars['serie']->do_else = false;
?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['directores']->value, 'director');
$_smarty_tpl->tpl_vars['director']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['director']->value) {
$_smarty_tpl->tpl_vars['director']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['serie']->value->id_director == $_smarty_tpl->tpl_vars['director']->value->id) {?>
                            <?php $_smarty_tpl->_assignInScope('nombreDirector', $_smarty_tpl->tpl_vars['director']->value->nombre);?>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['serie']->value->nombre;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['serie']->value->genero;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['nombreDirector']->value;?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['usuarioLogueado']->value != null) {?>
                            <td><button class="btnEliminar"><a href="eliminar/<?php echo $_smarty_tpl->tpl_vars['serie']->value->id;?>
">Eliminar</a></button></td>
                            <td><button class="btnEditar"><a href="editar/<?php echo $_smarty_tpl->tpl_vars['serie']->value->id;?>
">Editar</a></button></td>
                        <?php }?>    
                        <td><a class="btnVerMas" href="verSerie/<?php echo $_smarty_tpl->tpl_vars['serie']->value->id;?>
">Ver Mas</a></td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        </div>

    <?php if ($_smarty_tpl->tpl_vars['usuarioLogueado']->value != null) {?>
        <div>
            <form action="agregar" method="POST" class="formTabla2019">
                <h2>¡Agregar tu serie favorita a la tabla!</h2>        
                <input type="text" name="serie" placeholder="Serie">
                <input type="text" name="genero" placeholder="Genero">
                <select name="director" id="director">
                    <option>Director</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['directores']->value, 'director');
$_smarty_tpl->tpl_vars['director']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['director']->value) {
$_smarty_tpl->tpl_vars['director']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['director']->value->nombre;?>
"><?php echo $_smarty_tpl->tpl_vars['director']->value->nombre;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <input id="btnAgregar" type="submit" value="Agregar">
            </form>
        </div>
    <?php }?>
    
        <div id="divLinkDirectores">
            <a href="directores" id="botonVerDirectores">Ver Directores</a>
        </div>
    </aside>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
