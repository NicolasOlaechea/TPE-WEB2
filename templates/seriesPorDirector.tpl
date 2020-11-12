{include file="header.tpl"} <!--Incluyo el header-->

<div class="listaSeriesPorDirector">
<h2>Series del director: {$nombreDirector}</h2>

        {foreach from=$series item=serie}
                <ul>
                        <li>{$serie->nombre_serie}</li>
                </ul>
        {/foreach}

        <a href="directores">Volver</a>
</div>

{include file="footer.tpl"} <!--Incluyo el footer-->