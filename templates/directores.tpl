{include file="header.tpl"} <!--Incluyo el header-->

<aside class="estadisticas">
        <h2 class="tituloSecciones">Tabla de directores</h2>
        <div class="divTabla">
        <table class="tablaEstadisticas">
            <thead>
                    <th>Director</th>
                    <th>Edad</th>
                    <th>Nacionalidad</th>
            </thead>
            <tbody id="bodyTabla">
                {foreach from=$directores  item=director}
                    <tr>
                        <td>{$director->nombre_director}</td>
                        <td>{$director->edad}</td>
                        <td>{$director->nacionalidad}</td>
                        {if $usuarioLogueado != null}
                            <td><button class="btnEliminar"><a href="eliminarDirector/{$director->id}">Eliminar</a></button></td>
                            <td><button class="btnEditar"><a href="editarDirector/{$director->id}">Editar</a></button></td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
        </div>   
             
        {if $usuarioLogueado != null}
            <div class="mensajeEliminarDirector">
                <h4>*No se pueden eliminar directores que tengan asignadas una o mas series*</h3>
            </div>
        {/if}

        {if $usuarioLogueado != null}
            <div>
                <form action="agregarDirector" method="POST" class="formTabla2019">
                    <h2>¡Agregar director a la tabla!</h2>        
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="number" name="edad" placeholder="Edad">
                    <input type="text" name="nacionalidad" placeholder="Nacionalidad">
                    <input id="btnAgregar" type="submit" value="Agregar">
                </form>
            </div>
        {/if}
        <div class="buscarSeriesPorDirector">
            <h2>Buscar series por director</h2>
            <form action="seriesDirector" method="post">
                <label>Seleccione el director:</label>
                <select name="director" id="director">
                    <option>Director</option>
                    {foreach from=$directores item=director}
                        <option value="{$director->nombre_director}">{$director->nombre_director}</option>
                    {/foreach}
                </select>
                <input type="submit" value="Buscar">
            </form>
        </div>    
    </aside>     
       
{include file="footer.tpl"} <!--Incluyo el footer-->