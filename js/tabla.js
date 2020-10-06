document.addEventListener('DOMContentLoaded', cargarPagina);

"use strict"

function cargarPagina () {
            
    let buttons = document.getElementsByClassName('botonEditarTD'); 

    for(let i = 0; i<buttons.length; i++) {          //con este for hago que todos los botones con la clase botoneditarTD funcionen

        buttons[i].addEventListener('click', () => {  

            
            console.log("este funciono! tocaste el boton: " + i);
            console.log("este fuwwnciono! tocaste el boton: " + i);
            let carro = document.getElementById('viandasTable');
            let child = carro.childNodes[i + 1].innerHTML;  //child nodes es como el "hijo" de carrito es decir los tr. entonces deoende el boton que toco se edita ese en especifico.                            
            child.innerHTML = '<td><a class="textoInput2"> Vianda: <input type="text" id="productoNuevo"> </a></td><td><a class="textoInput2"> Descripcion: <input type="text" id="descripcionNueva"></a></td><td><a class="textoInput2"> Precio: <input type="number" id="precioNuevo"></a></td><td><a class="textoInput2"><select name="dirigidoA" id="select">{foreach from=$tipo item=categoria}<option value="{$categoria->id_dirigidoA}">{$categoria->tipo_vianda}</option>{/foreach}</select></a></td><td class="botonBorrar"><button type="button" id="edicionTerminada">Edicion terminada!</button></td>';
            document.getElementById("edicionTerminada").addEventListener("click", function(){ //una vez que el usuario lleno los input da click en edicionTerminada y pasa estoVV
                
                let producto = document.getElementById('productoNuevo').value;
                let precio = parseInt (document.getElementById('precioNuevo').value);
                let checkBox = document.getElementById('btn-celiacos2');
                total += precio;
                
                let nuevoCarrito = cargarObjeto(producto, precio, checkBox)

                if ((producto != '') && (precio != '')) {
                    
                    let idProducto = carro.childNodes[i+1].childNodes[3].childNodes[1].id; //voy al id del boton ya que ese es el id de la vianda
                    editarTablaServidor(nuevoCarrito, idProducto,child,i); //le paso como parametros para usarlos mas adelante.
                }

                else{
                    alert("Complete los casilleros.");
                }
            })
        })
        
    }

}
