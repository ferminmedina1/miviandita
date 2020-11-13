"use strict";
document.addEventListener('DOMContentLoaded', cargarPagina);

function cargarPagina () {
    
    getComments()

    document.querySelector("#btnEnviar").addEventListener("click", function(e) {
        e.preventDefault();
        let id_vianda = getIdVianda()
        let comentario = document.querySelector("#textComentario").value
        let radioCalificacion = document.getElementsByName('calificacion'); //OBTIENE TODOS LOS INPUTS DE LAS ESTRELLAS
        let id_user = leerCookie();
        let puntaje = 0
        
        for (let i = 0, length = radioCalificacion.length; i < length; i++) { //LOS RECORRE
            
            if (radioCalificacion[i].checked)           //SI ESTA SELECCIONADO
                puntaje= radioCalificacion[i].value     //PUNTAJE SE VUELVE EL VALOR DE ESE INPUT

        }
    
        let comment = {
            "comentario": comentario,
            "id_vianda": id_vianda,
            "calificacion": puntaje,
            "id_user": id_user
        }

        if((comment.comentario != "") && (comment.calificacion != 0)){  //SI ESTAN VACIOS LOS CAMPOS NO SE ENVIA
        
            fetch('api/calificarVianda', {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(comment)
            })
                .then(response =>  response.json())
                .then(comments => getComments())    //OBTIENE LOS COMENTARIOS
                .catch(error => console.log(error));
        }

        document.getElementById("formulario").reset();  //SE RESETEAN LOS CAMPOS DEL FORMULARIO
    })

 //SE OBTIENEN LOS COMENTARIOS DE LA VIANDA
    function getComments(){
        
        let id= getIdVianda();

        fetch('api/comentarios/'+ id +'')
            .then(response =>  response.json())
            .then(comments => renderComments(comments)) //SE LLAMA A LA FUNCION QUE LOS MUESTRA
            .catch(error => sinComentarios());
    }
 
 //CUANDO NO HAY COMENTARIOS, ENTRA EN EL .CATCH Y MUESTRA EN EL DOM QUE NO HAY COMENTARIOS
    function sinComentarios() {

        let lista = document.querySelector(".listaComentarios");
        lista.innerHTML = "Esta vianda aún no tiene calificaciones"
    }

 //MUESTRA LOS COMENTARIOS EN EL DOM
    function renderComments(comments) {

        let lista = document.querySelector(".listaComentarios");
        lista.innerHTML = ""            //SE VACIA EL DIV
        comments.forEach(comment => {
            
         //A PARTIR DE LA CALIFICACION QUE SE OBTIENE DESDE LA API, SE CREA UNA VARIABLE STRING CON LA CANTIDAD DE ESTRELLAS (MAX 5)
            let estrella = "★"
            let estrellas = ""

            for (let i = 0; i < comment.calificacion; i++){
                estrellas += estrella   //SE VAN CONCATENANDO LAS ESTRELLAS
            }
         //SE CREA EL COMENTARIO JUNTO CON EL USUARIO Y LA CALIFICACION
            lista.innerHTML += "<li class='comentario'>" + 
                "<div class='usuarioCalificacion'>"+
                "<div class='imgYUser'>" + 
                "<img src='./images/user.png' class='imgUser'>" +
                comment.user + "</div>" + "<div class='userCalificacion'>"+  estrellas  +"</div>"+"</div>" + 
                "<div class='textoComentario'>"+ comment.comentario  + "</div>" +  
             "</li>";
             //FALTA AGREGAR EL BOTON PARA ELIMINAR COMENTARIOS
             //Y HACER QUE SOLO EL ADMIN LOS VEA
        })
    
    }

//SE OBTIENE EL ID DE LA VIANDA MEDIANTE LA URL
    function getIdVianda(){
        
        let url = window.location.href; //TRAE LA URL
        let id = url.substring(url.lastIndexOf('/') + 1); //RECORRE LA URL HASTA EL ULTIMO "/" Y A PARTIR DE AHI TRAE EL ID
        return id;  //RETORNA EL ID
    }

 //DESDE LA COOKIE DEL NAV SE OBTIENE EL ID DEL USUARIO
    function leerCookie() {
       // https://aprende-web.net/javascript/js14_2.php 
        let lista = document.cookie.split(";");
        let micookie;
        for (let i in lista) {
            let busca = lista[i].search("id_user");
            if (busca > -1) 
                micookie=lista[i]
        }
        let igual = micookie.indexOf("=");
        let valor = micookie.substring(igual+1);
        return valor;
        }

}