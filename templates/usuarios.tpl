{include file="header.tpl"} <!--Incluyo el header-->

<div class="contenido">
    <table>
        <thead>
            <th>Usuario</th>
            <th>Administrador</th>
            <th>Cambiar Rol</th>
            <th>Eliminar</th>
        </thead>
        <tbody>        
            {foreach from=$usuarios item=usuario}
                {if $usuario->email != $usuarioLogueado->email}
                    <tr>
                        <td>
                            {$usuario->email}
                        </td>
                        <td>
                            {if $usuario->rol == "administrador"}
                                Si
                            {/if}
                            {if $usuario->rol != "administrador"}
                                No
                            {/if}
                        </td>
                        <td>
                            
                            <button class=""><a href="cambiarRol/{$usuario->id}">Cambiar Rol</a></button>

                        </td>
                        <td>
                            <button class="btnEliminar"><a href="eliminarUsuario/{$usuario->id}">Eliminar</a></button>
                        </td>
                    </tr>
                {/if}
            {/foreach}
        </tbody>
    </table>
    <div class="mensajeEliminarDirector">
        <h4>*No se pueden eliminar usuarios que hayan hecho comentarios en una o mas series*</h3>
    </div>
</div>

{include file="footer.tpl"} <!--Incluyo el footer-->