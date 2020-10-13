<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-11 05:58:04
  from 'C:\xampp\htdocs\TPE\templates\registro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8282ccc24be2_22586488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3fc1ae248f6d060965436e76b0aecfd82f39443d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\registro.tpl',
      1 => 1602388651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f8282ccc24be2_22586488 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el header-->

<main class="contenedorRegistro">
        <form action="agregarUsuario" method="POST" class="formRegistro">
            <h4 class="tituloRegistro">REGISTRO</h4>
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
                <input class="botonSubmit" id="botonSubmit" type="submit" value="Registrarse">
                <p id="parrafoResultado"></p>
            </div>
        </form>
    </main>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <!--Incluyo el footer--><?php }
}
