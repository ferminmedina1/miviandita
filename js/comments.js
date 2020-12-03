"use strict";
document.addEventListener('DOMContentLoaded', cargarPagina);

function cargarPagina () {
    
    getComments();  //AL CARGAR LA PAGINA SE CARGAN LOS COMENTARIOS
    
 //ENVIAR COMENTARIO
    document.querySelector("#btnEnviar").addEventListener("click", function(e) {
        
        e.preventDefault();
        let id_vianda = getIdVianda();
        let comentario = document.querySelector("#textComentario").value;
        let id_user = leerCookie();
        let puntaje = 0;
        let radioCalificacion = document.getElementsByName('calificacion'); //OBTIENE TODOS LOS INPUTS DE LAS ESTRELLAS
        
        for (let i = 0, length = radioCalificacion.length; i < length; i++) { //LOS RECORRE
            
            if (radioCalificacion[i].checked)           //SI ESTA SELECCIONADO
                puntaje = radioCalificacion[i].value;   //PUNTAJE SE VUELVE EL VALOR QUE TENGA ESE INPUT

        }
     //OBJETO
        let comment = { 
            "comentario": comentario,
            "id_vianda": id_vianda,
            "calificacion": puntaje,
            "id_user": id_user
        }

        if((comment.comentario != "") && (comment.calificacion != 0)){  //SI ESTAN VACIOS LOS CAMPOS NO SE ENVIA
            
            let lista = document.querySelector(".error");
            lista.innerHTML = "";

            fetch('api/calificarVianda', {
                method: 'POST',
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(comment)
            })
                .then(response =>  response.json())
                .then(get => getComments())    //OBTIENE LOS COMENTARIOS
                .catch(error => console.log(error));

        }

        else if(comment.comentario == ""){  //SI NO SE INGRESO UN COMENTARIO
            let lista = document.querySelector(".error");
            lista.innerHTML = "Ingrese un comentario."
        }

        else if(comment.calificacion == 0){ //SI NO SE CALIFICO LA VIANDA
            let lista = document.querySelector(".error");
            lista.innerHTML = "Ingrese una calificacion."
        }

        document.getElementById("formulario").reset();  //SE RESETEAN LOS CAMPOS DEL FORMULARIO
    })

 //SE OBTIENEN LOS COMENTARIOS DE LA VIANDA
    function getComments(){
        
        let id= getIdVianda();

        fetch('api/comentarios/vianda/'+ id +'')
            .then(response =>  response.json())
            .then(comments => renderComments(comments)) //SE LLAMA A LA FUNCION QUE LOS MUESTRA
            .catch(error => sinComentarios());
    }
 
 //CUANDO NO HAY COMENTARIOS, ENTRA EN EL .CATCH Y MUESTRA EN EL DOM QUE NO HAY COMENTARIOS
    function sinComentarios() {

        let lista = document.querySelector(".listaComentarios");
        if(lista == null){
            lista = document.querySelector(".listaComentariosVIP");
        }

        lista.innerHTML = "Esta vianda aún no tiene calificaciones";
    }

 //MUESTRA LOS COMENTARIOS EN EL DOM
    function renderComments(comments) {

        let lista = document.querySelector(".listaComentariosVIP"); //se busca si existe la lista de comentarios vip el cual aparecera si el usuario es admin
        if(lista == null){ //si no existe le asigno la lista de comentarios
            lista = document.querySelector(".listaComentarios");
        }
        lista.innerHTML = "";           //SE VACIA EL DIV

        comments.forEach(comment => {

            //A PARTIR DE LA CALIFICACION QUE SE OBTIENE DESDE EL JSON, SE CREA UNA VARIABLE STRING CON LA CANTIDAD DE ESTRELLAS (MAX 5)
                let estrella = "★";
                let estrellas = "";

                for (let i = 0; i < comment.calificacion; i++){
                    estrellas += estrella;   //SE VAN CONCATENANDO LAS ESTRELLAS
                }

            //SE CREA EL COMENTARIO JUNTO CON EL USUARIO Y LA CALIFICACION
            if(lista == document.querySelector(".listaComentariosVIP")){ //si la lista de comentarios es la vip aparece el boton borrar.
                
                lista.innerHTML += "<li class='comentario'>" + 
                    "<div class='usuarioCalificacion'>"+
                    "<div class='imgYUser'>" + 
                    "<img src='./images/user.png' class='imgUser'>" +
                    comment.user + "</div>" + "<div class='userCalificacion'>"+  estrellas  +"</div>"+"</div>" + 
                    "<div class='textoComentario'>"+ comment.comentario  + "<i class='botonBorrar material-icons' id='"+ comment.id_comentario+"'style='font-size:36px'>delete</i></div>" +  
                "</li>";
            
                boton_borrar_fila(); //se le da funcionalidad
            }
            else{ //si no se encuentra se carga la lista de comentarios normales.
                lista.innerHTML += "<li class='comentario'>" + 
                "<div class='usuarioCalificacion'>"+
                "<div class='imgYUser'>" + 
                "<img src='./images/user.png' class='imgUser'>" +
                comment.user + "</div>" + "<div class='userCalificacion'>"+  estrellas  +"</div>"+"</div>" + 
                "<div class='textoComentario'>"+ comment.comentario  + "</div>" +  
                "</li>";
            }

        });
    
    }

 //SE OBTIENE EL ID DE LA VIANDA MEDIANTE LA URL
    function getIdVianda(){
        
        let url = window.location.href; //TRAE LA URL POR EJ http://localhost/TPE-WEB/vianda/4
        let id = url.substring(url.lastIndexOf('/') + 1); //RECORRE LA URL HASTA EL ULTIMO "/" Y A PARTIR DE AHI TRAE EL ID
        return id;  //RETORNA EL ID
    }

 //DESDE LA COOKIE DEL NAV SE OBTIENE EL ID DEL USUARIO
    function leerCookie() {
       // https://aprende-web.net/javascript/js14_2.php 
       
        let lista = document.cookie.split(";"); //CONVIERTE EL STRING EN UN ARREGLO SEPARA CADA COOKIE CUANDO HAY UN ";"
        let micookie;
        for (let i in lista) {  //RECORRE EL ARREGLO

            let busca = lista[i].search("id_user"); //SE BUSCA LA COOKIE DENTRO DEL ARREGLO CON EL NOMBRE "id_user"
            if (busca > -1) 
                micookie=lista[i]; //SI ENTRA HASTA ACA ES PORQUE ENCONTRO LA COOKIE EN EL ARREGLO
        }     

        let igual = micookie.indexOf("=");  //DEVUELVE LA POSICION DONDE ESTA EL SIGNO =
        let valor = micookie.substring(igual+1);  //A PARTIR DE LA POS DEL = +1 , DEVUELVE LO QUE SIGUE 
        return valor;   //RETORNA EL ID DEL USUARIO
    }
    
 //FUNCION PARA EL BOTON BORRAR COMENTARIO
    function boton_borrar_fila () { 

        let buttons = document.getElementsByClassName('botonBorrar'); //TODOS LOS BOTONES BORRAR COMENTARIO
    
        for (let i = 0; i < buttons.length; i++) { //SE RECORREN
            
            buttons[i].addEventListener('click', function() {   
                let id = buttons[i].id;     //SE VUELVE EL ID DEL BOTON QUE SE APRETO
                borrarComentario_en_servidor(id);
            })
                
        }
    }

 //BORRA UN DETERMINADO COMENTARIO
    function borrarComentario_en_servidor(id) {

        fetch('api/comentarios/'+ id,{  //SE BORRA EL COMENTARIO
            
            'method': 'DELETE',
            'mode': "cors"

        })
        .then(response =>  response.json())
        .then(get => getComments())          //OBTIENE LOS COMENTARIOS PARA ACTUALIZAR LA LISTA DE COMENTARIOS
        .catch(error => console.log(error));
    }

}