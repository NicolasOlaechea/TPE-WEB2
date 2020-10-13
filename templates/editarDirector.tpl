{include file="header.tpl"} <!--Incluyo el header-->

<div>
    <form id="formEditar" class="formEditar" action="completarEdicionDirector/{$director->id}" method="POST">
        <h2>¡Modifica tu director favorito de la tabla!</h2> 
             
        <input value="{$director->nombre}" type="text" name="nombre" placeholder="Nombre">
        <input value="{$director->edad}" type="text" name="edad" placeholder="Edad">
        <input value="{$director->nacionalidad}" type="text" name="nacionalidad" placeholder="Nacionalidad">

        <input id="submitEditar" type="submit" value="Editar">
    </form>
</div>

{include file="footer.tpl"} <!--Incluyo el footer-->