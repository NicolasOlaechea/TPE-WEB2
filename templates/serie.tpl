{include file="header.tpl"} <!--Incluyo el header-->

<main class="contenido">
    <div class="divInfoSerie">
        <h2>Informacion sobre la serie: {$serie->nombre_serie}</h2>
        <div class="infoDivSerie">
            <div>
                <ul>
                    <li>Nombre: {$serie->nombre_serie}</li>
                    <li>Genero: {$serie->genero}</li>
                    <li>Director: {$serie->nombre_director}</li>
                </ul>
                <a href="home">Volver</a>
            </div>
            <div>
                {if $serie->imagen}
                    <img src="images/series/{$serie->imagen}" class="imgSerie">
                {/if}
            </div>
        </div>
        <div class="contenedorComentarios">
            <form id="formComentarios" action="agregarComentario" method="POST" class="formTabla2019">
                {if $usuarioLogueado != null}
                    <h2>¡Agrega un comentario a la serie!</h2>        
                    <input type="text" id="contenido" name="contenido" placeholder="Escribir comentario">
                    <select name="puntaje" id="puntaje">
                        <option>Puntaje</option>
                        {foreach from=$puntajes item=puntaje}
                            <option value="{$puntaje}">{$puntaje}</option>
                        {/foreach}
                    </select>
                    <input id="btnAgregar" type="submit" value="Agregar">
                {/if}
            </form>
        </div>
        <div id="divComentarios" class="divComentarios" data-id-serie="{$serie->id}" 
        {if $usuarioLogueado != null}
        data-id-usuario="{$usuarioLogueado->id}" 
        data-rol-usuario="{$usuarioLogueado->rol}"
        {/if}
        >
            <ul id="listaComentarios" class="listaComentarios">

            </ul>
        </div>
    </div>       
</main>

<script src="./js/comentarios.js"></script>

{include file="footer.tpl"} <!--Incluyo el footer-->