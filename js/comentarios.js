"use strict"

document.addEventListener("DOMContentLoaded", function(){
    //Cuando carga la pagina:
    //Obtengo el ID de la serie seleccionada 
    //Llamo a la funcion getComentarios()
    //Le asigno el evento al formulario de agregar comentarios
    let idSerie = document.querySelector("#divComentarios").getAttribute("data-id-serie");
    getComentariosPorSerie(idSerie);
    if(document.querySelector("#formComentarios") != null)
        document.querySelector("#formComentarios").addEventListener("submit", agregarComentario);
})

//Obtengo todos los comentarios de una serie haciendo un POST a la API y los muestro
function getComentariosPorSerie(id_serie){
    fetch("api/serie/"+id_serie+"/comentarios")
        .then(function(response){
            return response.json();
        })
        .then(function(comentarios){
            mostrarComentarios(comentarios);  
        })
        .catch(function(error){
            console.log(error);
        });
}

//Muestro los comentarios que obtengo de la API
function mostrarComentarios(comentarios){
    //Obtengo la lista vacia, el id de la serie seleccionada y el rol del usuario actual
    let contenedor = document.querySelector("#listaComentarios");
    let idSerie = document.querySelector("#divComentarios").getAttribute("data-id-serie");
    let rolUsuario = document.querySelector("#divComentarios").getAttribute("data-rol-usuario");
    contenedor.innerHTML = "";
    let suma = 0;
    for(let c of comentarios){
        suma += parseInt(c.puntaje); //Sumo todos los puntajes de los comentarios
    }

    let promedio = 0;
    if(comentarios.length != 0){
        promedio = suma/comentarios.length; //Calculo el promedio
    }
    
    document.querySelector("#puntuacionPromedio").innerHTML = "★"+promedio.toFixed(1);
    for(let comentario of comentarios){
        if(comentario.id_serie == idSerie){
            //Creo un li(donde va el contenido del comentario)
            let li = document.createElement("li");

            let spanContenido = document.createElement("span");
            spanContenido.innerHTML = "💬"+comentario.contenido;
            let spanPuntaje = document.createElement("span");
            spanPuntaje.innerHTML = "★"+comentario.puntaje;
            let spanEmail = document.createElement("span");
            spanEmail.innerHTML = "👤"+comentario.email;
            li.appendChild(spanContenido);
            li.appendChild(spanPuntaje);
            li.appendChild(spanEmail);
            
            //Creo un boton eliminar
            let button = document.createElement("button");
            button.innerHTML = "Eliminar";

            //Creo un atributo y lo asingo al boton, su valor es el id del comentario
            let a = document.createAttribute("data-id-comentario");
            a.value = comentario.id;
            button.setAttribute("data-id-comentario", a.value);
            button.classList.add("btnEliminar");

            //Le agrego a la lista vacia todos los elementos que cree anteriormente
            contenedor.appendChild(li);
            if(rolUsuario == "administrador"){
                li.appendChild(button);
            }

            //Le asigno el evento al boton para eliminar un comentario
            button.addEventListener("click", function(){
                let id_comentario = this.getAttribute("data-id-comentario");
                eliminarComentario(id_comentario);
            })
        }
    }

}

//Agrego un comentario haciendo un POST con los valores de los inputs y luego actualizo
function agregarComentario(event){
    event.preventDefault();

    //Obtengo los datos ingresados por el usuario
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
        let idSerie = document.querySelector("#divComentarios").getAttribute("data-id-serie");
        getComentariosPorSerie(idSerie);
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
        let idSerie = document.querySelector("#divComentarios").getAttribute("data-id-serie");
        getComentariosPorSerie(idSerie);
    })
    .catch(function(error){
        console.log(error);
    })
}
