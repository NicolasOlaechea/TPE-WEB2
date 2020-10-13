<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 19:40:44
  from 'C:\xampp\htdocs\TPE\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f84951c62ca08_60127579',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f223d49c90e8ac618c90b156b1ed2c4cb8694150' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\templates\\header.tpl',
      1 => 1602524441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f84951c62ca08_60127579 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Home</title>
    <link rel="stylesheet" href="css/estilo.css">
    <?php echo '<script'; ?>
 src="js/barraNavegacionResponsive.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/main.js"><?php echo '</script'; ?>
>
</head>

<body>
    <!-- Header, contiene: 
        -un logo
        -BARRA DE NAVEGACION-->
    <header class="header">
        <a href="index.html"><img class="logoPagina" src="images/logoPagina.png" alt="Logo Pagina"></a>
        <img id="menuLogo" src="images/menu-logo.png" alt="Menu-logo" class="menuLogo">
        <nav>
            <ul id="barraNav" class="barraNavegacion">
                <a href="home"><li>Inicio</li></a>
                <a href="peliculas"><li>Peliculas</li></a>
                <a href="series"><li>Series</li></a>
                <a href="registro"><li>Registro</li></a>
                <a href="login"><li>Login</li></a>
                <a href="logout"><li>Logout</li></a>
            </ul>
        </nav>
    </header><?php }
}
