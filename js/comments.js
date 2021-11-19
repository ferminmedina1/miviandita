"use strict";
document.addEventListener('DOMContentLoaded', cargarPagina);

function cargarPagina () {
    
    getComments();
    
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
        }else if(comment.comentario == ""){
            let lista = document.querySelector(".error");
            lista.innerHTML = "Ingrese un comentario."
        }else if(comment.calificacion == 0){
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

        lista.innerHTML = "Esta vianda aún no tiene calificaciones"
    }

 //MUESTRA LOS COMENTARIOS EN EL DOM
    function renderComments(comments) {
        let lista = document.querySelector(".listaComentariosVIP"); //busco si existe la lista de comentarios vip el cual aparecera si el usuario es admin
        if(lista == null){ //si no existe le asigno la lista de comentarios
            lista = document.querySelector(".listaComentarios");
        }
        lista.innerHTML = ""            //SE VACIA EL DIV
        comments.forEach(comment => {
         //A PARTIR DE LA CALIFICACION QUE SE OBTIENE DESDE LA API, SE CREA UNA VARIABLE STRING CON LA CANTIDAD DE ESTRELLAS (MAX 5)
            let estrella = "★"
            let estrellas = ""

            for (let i = 0; i < comment.calificacion; i++){
                estrellas += estrella   //SE VAN CONCATENANDO LAS ESTRELLAS
            }
         //SE CREA EL COMENTARIO JUNTO CON EL USUARIO Y LA CALIFICACION
        if(lista == document.querySelector(".listaComentariosVIP")){ //si la lista de comentarios es la vip aparece el boton borrar.
            lista.innerHTML += "<li class='comentario'>" + 
                "<div class='usuarioCalificacion'>"+
                "<div class='imgYUser'>" + 
                "<img src='./images/user.png' class='imgUser'>" +
                comment.user + "</div>" + "<div class='userCalificacion'>"+  estrellas  +"</div>"+"</div>" + 
                "<div class='textoComentario'>"+ comment.comentario  + "<i class='botonBorrar material-icons' id='"+ comment.id_comentario+"'style='font-size:36px'>delete</i><i class='botonEditar fa fa-edit' id='"+ comment.id_comentario+" style='font-size:36px'></i></div>" +  
             "</li>";
        
             boton_borrar_fila(); //se le da funcionalidad
             boton_editar_fila();
        }else{ //si no se encuentra se carga la lista de comentarios normales.
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
    

    function boton_borrar_fila () { 
        let buttons = document.getElementsByClassName('botonBorrar'); 
    
            for (let i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener('click', function() {
                    let id = buttons[i].id; //busco a cual fue al que se le dio click
                    borrarComentario_en_servidor(id);
                })
                
            }
    }
    
    function boton_editar_fila () { 
        let buttons = document.getElementsByClassName('botonEditar'); 
    
            for (let i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener('click', function() {
                    let id = buttons[i].id; //busco a cual fue al que se le dio click
                    editarComentario_en_servidor(id);
                    console.log("funciono");
                })
                
            }
    }

    function borrarComentario_en_servidor(id) {

        fetch('api/comentarios/'+ id,{
            
            'method': 'DELETE',
            'mode': "cors"

        })//con metodo delete borro el comentario con su respectivo id.
        
        .then(response =>  response.json())
        .then(get => getComments())    //OBTIENE LOS COMENTARIOS devuelta para que aparazcan sin el anteriormente borrado
        .catch(error => console.log(error));
    }

    function editarComentario_en_servidor(id) {
        let id_user = leerCookie();

        let comment = {
            "comentario": "Muy rica!",
            "id_vianda": id,
            "calificacion": 2,
            "id_user": id_user
        }
        
        fetch('api/comentarios/' + id , {
            method: 'PUT',
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(comment)
        })
        .then(response =>  response.json())
        .then(get => getComments())    //OBTIENE LOS COMENTARIOS devuelta para que aparazcan sin el anteriormente borrado
        .catch(error => console.log(error));
    }

}