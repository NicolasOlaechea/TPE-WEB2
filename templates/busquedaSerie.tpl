{include file="header.tpl"} <!--Incluyo el header-->
<aside class="estadisticas">
<div class="divTabla">
            <table class="tablaEstadisticas">
                <thead>
                    <tr>
                        <th></th>
                        <th>Serie</th>
                        <th>Genero</th>
                        <th>Director</th>
                    </tr>
                </thead>
                <tbody id="bodyTabla">
                    {foreach from=$series item=serie}
                        <tr>
                            <td>
                                {if $serie->imagen != null}
                                    <img src="images/series/{$serie->imagen}" class="imgTablaSeries">
                                {/if}
                            </td>
                            <td>{$serie->nombre_serie}</td>
                            <td>{$serie->genero}</td>
                            <td>{$serie->nombre_director}</td>  
                            <td><a class="btnVerMas" href="verSerie/{$serie->id}">Ver Mas</a></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
</aside>
{include file="footer.tpl"} <!--Incluyo el footer-->