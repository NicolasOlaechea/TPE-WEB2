{include file="header.tpl"} <!--Incluyo el header-->

<main class="contenedorRegistro">
        <form action="agregarUsuario" method="POST" class="formRegistro">
            <h4 class="tituloRegistro">REGISTRO</h4>
            
            {if $mensaje != ""}
                <div class="mensajeLogin">
                    {$mensaje}
                </div>
            {/if}
            
            <input class="inputForm" type="email" name="email" placeholder="Ingrese su email">
            <input class="inputForm" type="password" name="password" placeholder="Ingrese una contraseña">

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

<script src="js/captcha.js"></script>

{include file="footer.tpl"} <!--Incluyo el footer-->