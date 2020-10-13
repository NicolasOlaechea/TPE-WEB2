<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 20:00:12
  from 'C:\xampp\htdocs\TPE\templates\seriesPorDirector.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8499ac283d72_51239202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e35892d7cb24bc80fd91bdb50a2f8b9af34e17e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\seriesPorDirector.tpl',
      1 => 1602388787,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f8499ac283d72_51239202 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<div class="listaSeriesPorDirector">
<h2>Series del director: <?php echo $_smarty_tpl->tpl_vars['nombreDirector']->value;?>
</h2>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['series']->value, 'serie');
$_smarty_tpl->tpl_vars['serie']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['serie']->value) {
$_smarty_tpl->tpl_vars['serie']->do_else = false;
?>
                <ul>
                        <li><?php echo $_smarty_tpl->tpl_vars['serie']->value->nombre;?>
</li>
                </ul>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <a href="directores">Volver</a>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
