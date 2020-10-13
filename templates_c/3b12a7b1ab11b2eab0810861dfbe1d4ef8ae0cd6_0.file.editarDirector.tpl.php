<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-11 05:54:27
  from 'C:\xampp\htdocs\TPE\templates\editarDirector.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8281f3549207_72506243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b12a7b1ab11b2eab0810861dfbe1d4ef8ae0cd6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\editarDirector.tpl',
      1 => 1602388463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f8281f3549207_72506243 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<div>
    <form id="formEditar" class="formEditar" action="completarEdicionDirector/<?php echo $_smarty_tpl->tpl_vars['director']->value->id;?>
" method="POST">
        <h2>¡Modifica tu director favorito de la tabla!</h2> 
             
        <input value="<?php echo $_smarty_tpl->tpl_vars['director']->value->nombre;?>
" type="text" name="nombre" placeholder="Nombre">
        <input value="<?php echo $_smarty_tpl->tpl_vars['director']->value->edad;?>
" type="text" name="edad" placeholder="Edad">
        <input value="<?php echo $_smarty_tpl->tpl_vars['director']->value->nacionalidad;?>
" type="text" name="nacionalidad" placeholder="Nacionalidad">

        <input id="submitEditar" type="submit" value="Editar">
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
