{include file="header.tpl"} <!--Incluyo el header-->

<main class="contenido">
        <div class="divInfoSerie">
                <h2>Informacion sobre la serie: {$serie->nombre_serie}</h2>
                    <ul>
                        <li>Nombre: {$serie->nombre_serie}</li>
                        <li>Genero: {$serie->genero}</li>
                        <li>Director: {$serie->nombre_director}</li>
                    </ul>
            <a href="home">Volver</a>
        </div>       
</main>

{include file="footer.tpl"} <!--Incluyo el footer-->