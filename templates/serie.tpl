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
                <form action="agregarComentario" method="POST" class="formTabla2019">
                    <h2>¡Agrega un comentario a la serie!</h2>        
                    <input type="text" name="contenido" placeholder="Escribir comentario">
                    <select name="puntaje" id="puntaje">
                        <option>Puntaje</option>
                        {foreach from=$valores item=valor}
                            <option value="{$valor}">{$valor}</option>
                        {/foreach}
                    </select>
                    <input id="btnAgregar" type="submit" value="Agregar">
                </form>
            </div>
            <div id="divComentarios" class="divComentarios">

            </div>
        </div>       
</main>

{include file="footer.tpl"} <!--Incluyo el footer-->