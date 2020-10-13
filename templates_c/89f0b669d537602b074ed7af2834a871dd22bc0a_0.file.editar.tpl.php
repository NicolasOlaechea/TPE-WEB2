<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-11 05:50:58
  from 'C:\xampp\htdocs\TPE\templates\editar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f828122cded21_03902030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89f0b669d537602b074ed7af2834a871dd22bc0a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\editar.tpl',
      1 => 1602388253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f828122cded21_03902030 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<main class="contenido">
    <form id="formEditar" class="formEditar" action="completarEdicion/<?php echo $_smarty_tpl->tpl_vars['serie']->value->id;?>
" method="POST">
        <h2>¡Modifica una serie de la tabla!</h2> 
             
        <input value="<?php echo $_smarty_tpl->tpl_vars['serie']->value->nombre;?>
" type="text" name="serie" placeholder="Serie">
        <input value="<?php echo $_smarty_tpl->tpl_vars['serie']->value->genero;?>
" type="text" name="genero" placeholder="Genero">

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
        <input id="submitEditar" type="submit" value="Editar">
    </form>
</main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
