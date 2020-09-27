document.addEventListener('DOMContentLoaded', cargarPagina);

"use strict"

function cargarPagina () {

    let botones = document.querySelectorAll('.plato');
    let descripcion = document.querySelectorAll('.oculto');
            
        for (let i = 0; i < botones.length; i++) {

            botones[i].addEventListener('click', function() {

                console.log(botones[i])
                descripcion[i].classList.toggle("mostrar")
        })
    }

}