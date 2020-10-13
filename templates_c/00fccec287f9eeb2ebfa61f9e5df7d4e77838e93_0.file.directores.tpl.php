<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 19:54:43
  from 'C:\xampp\htdocs\TPE\templates\directores.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f849863110999_06570045',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00fccec287f9eeb2ebfa61f9e5df7d4e77838e93' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\directores.tpl',
      1 => 1602525248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f849863110999_06570045 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<aside class="estadisticas">
        <h2 class="tituloSecciones">Tabla de directores</h2>
        <div class="divTabla">
        <table class="tablaEstadisticas">
            <thead>
                    <th>Director</th>
                    <th>Edad</th>
                    <th>Nacionalidad</th>
            </thead>
            <tbody id="bodyTabla">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['directores']->value, 'director');
$_smarty_tpl->tpl_vars['director']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['director']->value) {
$_smarty_tpl->tpl_vars['director']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['director']->value->nombre;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['director']->value->edad;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['director']->value->nacionalidad;?>
</td>
                        <?php if ($_smarty_tpl->tpl_vars['usuarioLogueado']->value != null) {?>
                            <td><button class="btnEliminar"><a href="eliminarDirector/<?php echo $_smarty_tpl->tpl_vars['director']->value->id;?>
">Eliminar</a></button></td>
                            <td><button class="btnEditar"><a href="editarDirector/<?php echo $_smarty_tpl->tpl_vars['director']->value->id;?>
">Editar</a></button></td>
                        <?php }?>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
        </div>   
             
        <?php if ($_smarty_tpl->tpl_vars['usuarioLogueado']->value != null) {?>
            <div class="mensajeEliminarDirector">
                <h4>*No se pueden eliminar directores que tengan asignadas una o mas series*</h3>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['usuarioLogueado']->value != null) {?>
            <div>
                <form action="agregarDirector" method="POST" class="formTabla2019">
                    <h2>¡Agregar director a la tabla!</h2>        
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="number" name="edad" placeholder="Edad">
                    <input type="text" name="nacionalidad" placeholder="Nacionalidad">
                    <input id="btnAgregar" type="submit" value="Agregar">
                </form>
            </div>
        <?php }?>
        <div class="buscarSeriesPorDirector">
            <h2>Buscar series por director</h2>
            <form action="seriesDirector" method="post">
                <label>Seleccione el director:</label>
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
                <input type="submit" value="Buscar">
            </form>
        </div>    
    </aside>     
       
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
