<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-04 20:17:29
  from 'C:\xampp\htdocs\TPE\templates\serie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7a11b948b974_83878543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f156870020424edeb5afeb7410bdfa9fe9f8d56' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\serie.tpl',
      1 => 1601835444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f7a11b948b974_83878543 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<main class="contenido">
        <div class="divInfoSerie">
                <h2>Informacion sobre la serie: <?php echo $_smarty_tpl->tpl_vars['serie']->value->nombre;?>
</h2>
                    <ul>
                        <li>Nombre: <?php echo $_smarty_tpl->tpl_vars['serie']->value->nombre;?>
</li>
                        <li>Genero: <?php echo $_smarty_tpl->tpl_vars['serie']->value->genero;?>
</li>
                        <li>Director: <?php echo $_smarty_tpl->tpl_vars['nombreDirector']->value;?>
</li>
                    </ul>
            <a href="home">Volver</a>
        </div>       
</main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
