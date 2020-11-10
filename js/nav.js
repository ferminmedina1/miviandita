"use strict";
document.addEventListener('DOMContentLoaded', cargarNav);

function cargarNav () {

    document.querySelector("#btn-menu").addEventListener("click", function () {

            document.querySelector("nav").classList.toggle("desplegarNav");
    })

}
