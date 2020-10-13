<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-11 05:58:46
  from 'C:\xampp\htdocs\TPE\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8282f603f439_44273356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70c00958dce23c48401e8593013a5a0ab4c6eb36' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\login.tpl',
      1 => 1602388714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f8282f603f439_44273356 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<main class="contenedorRegistro">

        <form action="verificarUsuario" method="POST" class="formRegistro">
            <h4 class="tituloRegistro">LOGIN</h4>
            <?php if ($_smarty_tpl->tpl_vars['mensaje']->value != '') {?>
                <div class="mensajeLogin">
                    <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

                </div>
            <?php }?>
            <!--
            <input class="inputForm" type="text" placeholder="Ingrese su nombre">
            <input class="inputForm" type="text" placeholder="Ingrese su apellido">
            <input class="inputForm" type="text" placeholder="Ingrese un nombre de usuario">
            -->
            <input class="inputForm" type="email" name="email" placeholder="Ingrese su email">
            <input class="inputForm" type="password" name="password" placeholder="Ingrese una contraseña">
            <!--
            <input class="inputForm" type="password" placeholder="Confirmar contraseña">
            <label class="labelInput" >¿Cuales son sus preferencias?</label>
            <input type="checkbox" name="preferencias" value="Peliculas"><span> Peliculas</span>
            <input type="checkbox" name="preferencias" value="Series"><span> Series</span>
            -->
            <div id="divCaptcha" class="divCaptcha captchaSinResolver">
                <label class="labelInput">Ingrese el resultado de la siguiente suma para continuar:</label>
                <p class="parrafoCaptcha"><span id="primerNumero"></span> + <span id="segundoNumero"></span></p>
                <input class="inputCaptcha" id="inputCaptcha" type="text" value="">
                <label class="labelInput"></label>
                <input class="botonSubmit" id="botonSubmit" type="submit" value="Ingresar">
                <p id="parrafoResultado"></p>
            </div>
        </form>
    </main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
