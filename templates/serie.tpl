{include file="header.tpl"} <!--Incluyo el header-->

<main class="contenido">
        <div class="divInfoSerie">
                <h2>Informacion sobre la serie: {$serie->nombre}</h2>
                    <ul>
                        <li>Nombre: {$serie->nombre}</li>
                        <li>Genero: {$serie->genero}</li>
                        <li>Director: {$nombreDirector}</li>
                    </ul>
            <a href="home">Volver</a>
        </div>       
</main>

{include file="footer.tpl"} <!--Incluyo el footer-->