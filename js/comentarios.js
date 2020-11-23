"use strict"

document.addEventListener("DOMContentLoaded", function(){
    getComentarios();
    if(document.querySelector("#formComentarios") != null)
        document.querySelector("#formComentarios").addEventListener("submit", agregarComentario);

    
})

//Obtengo todos los comentarios de la API y los muestro
function getComentarios(){
    fetch("api/comentarios")
        .then(function(response){
            return response.json();
        })
        .then(function(comentarios){
            mostrarComentarios(comentarios);  
        })
        .catch(function(error){
            console.log(error);
        })
}

//Muestro los comentarios que obtengo de la API
function mostrarComentarios(comentarios){
    let contenedor = document.querySelector("#listaComentarios");
    let idSerie = document.querySelector("#divComentarios").getAttribute("data-id-serie");
    let rolUsuario = document.querySelector("#divComentarios").getAttribute("data-rol-usuario");
    contenedor.innerHTML = "";
    for(let comentario of comentarios){
        if(comentario.id_serie == idSerie){
            //Creo un li(donde va el contenido del comentario), un button
            // y los agrego al ul
            let li = document.createElement("li");
            li.innerHTML = comentario.contenido + " - "+ comentario.puntaje + " - " + comentario.email;
            
            let button = document.createElement("button");
            button.innerHTML = "Eliminar";
            let a = document.createAttribute("data-id-comentario");
            a.value = comentario.id;
            button.setAttribute("data-id-comentario", a.value);
            button.classList.add("btnEliminar");

            contenedor.appendChild(li);
            if(rolUsuario == "administrador"){
                li.appendChild(button);
            }

            //Le asigno el evento al boton para eliminar un comentario
            button.addEventListener("click", function(){
                //console.log(this.class);
                let id_comentario = this.getAttribute("data-id-comentario");
                console.log(id_comentario);
                eliminarComentario(id_comentario);
            })
        }
    }
}

//Agrego un comentario haciendo un POST con los valores de los inputs y luego actualizo
function agregarComentario(event){
    event.preventDefault();
    const body = {
        contenido: document.querySelector("#contenido").value,
        puntaje: document.querySelector("#puntaje").value,
        id_serie: document.querySelector("#divComentarios").getAttribute("data-id-serie"),
        id_usuario: document.querySelector("#divComentarios").getAttribute("data-id-usuario")
    }

    fetch("api/comentarios", {
        method: "POST",
        header: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(body)
    })
    .then(function(response){
        return response.json;
    })
    .then(function(comentario){
        getComentarios();
    })
    .catch(function(error){
        console.log(error);
    });
}

//Elimino un comentario haciendo un DELETE a la API
function eliminarComentario(id_comentario){
    fetch("api/comentarios/"+id_comentario, {
        method: "DELETE"
    })
    .then(function(response){
        return response.json();
    })
    .then(function(json){
        console.log(json);
        getComentarios();
    })
    .catch(function(error){
        console.log(error);
    })
}
