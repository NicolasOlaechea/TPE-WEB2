{include file="header.tpl"} <!--Incluyo el header-->

<main class="contenido">
    <form id="formEditar" class="formEditar" action="completarEdicion/{$serie->id}" method="POST">
        <h2>¡Modifica una serie de la tabla!</h2> 
             
        <input value="{$serie->nombre}" type="text" name="serie" placeholder="Serie">
        <input value="{$serie->genero}" type="text" name="genero" placeholder="Genero">

        <select name="director" id="director">
            <option>Director</option>
            {foreach from=$directores item=director}
                <option value="{$director->nombre}">{$director->nombre}</option>
            {/foreach}
        </select>
        <input id="submitEditar" type="submit" value="Editar">
    </form>
</main>

{include file="footer.tpl"} <!--Incluyo el footer-->