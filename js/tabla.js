document.addEventListener('DOMContentLoaded', cargarPagina);

"use strict"

function cargarPagina () {
   
    let compra = []
    let arregloID = [];
    let total = 0;

    cargarTabla_desde_api()           // AL CARGAR LA PAGINA APARECEN LOS ELEMENTOS PRECARGADOS
 
    
 // DATOS PRECARGADOS EN LA TABLA SACADOS DEL SERVIDOR


    function cargarTabla_desde_api() { 

            fetch("https://web-unicen.herokuapp.com/api/groups/103FerminMedinaAgustinArleo/viandas",{

                "method": "GET",
                "mode": "cors"

            })
            .then(function(r){
                
                if (!r.ok) {
                    console.log("error")
                }
                return r.json()

            })
            
            .then(function (json){
                for (let i = 0; i < json.viandas.length; i++) { // CON ESTE FOR SE AHORRA REPETIR CODIGO PARA CARGAR LOS OBJETOS DEL SERVIDOR
                    let checkBox = document.getElementById('btn-celiacos');            
                    let carrito = json.viandas[i];              //ES EL OBJETO "PELADO", SOLO EL PRODUCTO Y EL PRECIO
                    total += json.viandas[i].thing.precio;      //EL TOTAL SE VUELVE, EL TOTAL + EL PRECIO
                    compra.push(carrito.thing);                 //SE CARGA EL JSON AL ARREGLO
                    arregloID.push(json.viandas[i]._id);        //SE CARGAN LAS ID'S AL ARREGLO
                    let nro_id = json.viandas[i]._id            //SE OBTIENE LA ID DEL OBJETO
                    crear_tabla (carrito, nro_id,checkBox);        //SE PASAN COMO PARAMETROS EL JSON COMPLETO, EL CARRITO CON PRODUCTO Y PRECIO, Y EL ID
                }
           
            })

            .catch (function(e) {

                console.log(e)
    
            })

            console.log("Arreglo Compra:");
            console.log(compra);
            console.log("Arreglo de id's:");
            console.log(arregloID);
            
    }


 //BOTON AGREGAR 1
    

    document.getElementById("agregar").addEventListener("click", function() {
        
        let producto = document.getElementById('producto').value;
        let precio = parseInt (document.getElementById('precio').value);
        let checkBox = document.getElementById('btn-celiacos');
        let carrito;
        
        if ((producto != '') && (precio != '')) {

            carrito = cargarObjeto(producto, precio, checkBox);     // LA VARIABLE CARRITO SE VUELVE LO QUE RETORNA "cargarObjeto()"                   
            cargar_datos_a_la_API (carrito)               //SE SUBE AL SERVIDOR
        }

        console.log("Arreglo Compra:")
        console.log(compra)
        console.log("Arreglo de id's:")
        console.log(arregloID)
    })
 
    
 // BOTON AGREGAR X3
    

    document.getElementById("agregar3").addEventListener("click", function() {

        let cont = compra.length                                  //CONT SE VUELVE LA LONGUITUD DEL ARREGLO
        let max = cont +3;                                        // MAX SE VUELVE CONT + 3 PORQUE DESDE LA ULTIMA POSICION DEL ARREGLO SE CREAN 3 NUEVAS CELDAS
        let producto = document.getElementById('producto').value;
        let precio = parseInt (document.getElementById('precio').value);
        let checkBox = document.getElementById('btn-celiacos');
        let carrito;
        

        while ((cont < max) && ((producto != '') && (precio != ''))) {  // EL WHILE FUNCIONA COMO EL FOR, CICLA 3 VECES
            
            carrito = cargarObjeto(producto, precio,checkBox);                   // LA VARIABLE CARRITO SE VUELVE LO QUE RETORNA "cargarObjeto()"
            cargar_datos_a_la_API(carrito);                              //SE SUBE AL SERVIDOR
            cont = cont + 1;

        }
        
    })


 //BORRAR TODOS LOS ELEMEMTOS DE LA TABLA 
    

    document.getElementById("vaciarTabla").addEventListener('click', function(){
        
        eliminar_toda_la_API ();                            //SE BORRAN LOS OBJETOS DEL SERVIDOR, EXCEPTO LOS PRECARGADOS
        document.getElementById("carrito").innerHTML = '';  //SE BORRA EL HTML DE LAS FILAS
        compra = [];                                        //SE VACIA EL ARREGLO PQ AL VACIAR LA TABLA SE TENDRIA QUE BORRAR TODO
        arregloID = [];                                     //LO MISMO QUE EL DE ARRIBA 
        total = 0;                                          //SE REINICIA EL PRECIO
       
        console.log("Arreglo de compra:");
        console.log(compra);
        console.log();
        console.log("Arreglo de ID's:");
        console.log(arregloID);

    })
    
 
    /* FUNCION PARA CARGAR EL PRODUCTO, SU PRECIO Y EL PRECIO TOTAL DE LOS PRODUCTOS A UN OBJETO,
    RETORNA EL JSON "CARRITO" */


    function cargarObjeto(producto, precio, checkBox) {  //VERIFICAR QUE CUMPLA UNA FUNCION, SINO ELIMINAR
        
        let celiacos;

        if (checkBox.checked == true){
            celiacos = "si";
        }
        else{
            celiacos = "no"
        }

        let carrito = {         //OBJETO QUE CONTIENE EL ARTICULO CON SU PRECIO Y EL PRECIO TOTAL HASTA EL MOMENTO
            
            "thing": {

                "producto": producto,
                "precio" : precio,
                "celiacos": celiacos
            },
        }    

        return(carrito);

    }


 //SUBIR DATOS AL SERVIDOR


    function cargar_datos_a_la_API (carrito) { 

        fetch('https://web-unicen.herokuapp.com/api/groups/103FerminMedinaAgustinArleo/viandas', { 
            
            "method": "POST",
            "mode": "cors",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(carrito)
            
        })
        
        .then(function(r){

            if (!r.ok){
                console.log("ERROR!")
            }
            return r.json()

        })

        .then (function(json) {

            console.log("Carga exitosa!")
            compra.push(carrito.thing);                 //SE CARGAN LOS JSON AL ARREGLO
            arregloID.push(json.information._id);       //SE AGREGAN LOS IDS AL ARREGLO DE ID
            total += carrito.thing.precio;              //EL TOTAL SE VUELVE EL TOTAL + EL PRECIO DEL JSON
            let nro_id = json.information._id           //OBTENGO EL ID DEL OBJETO Y LO PASO AL CREAR FILA
            crear_tabla (carrito, nro_id)              /*EL CARRITO ES EL OBJETO CON PRODUCTO 
                                                        Y PRECIO SOLO (PARA CREAR LA FILA MAS FACIL) Y EL NRO_ID SIRVE PARA LOS BOTONES */
        })
        
        .catch(function(e){
            console.log(e);
        })
    }


 //FUNCION QUE CREA UNA NUEVA FILA EN LA TABLA A PARTIR DE DATOS OBTENIDOS DE EL SERVIDOR


    function crear_tabla (carrito, nro_id) {

            let nuevoID = nro_id;     //SE LE ASIGNA EL ID DEL OBJETO   
            let filaTabla = document.getElementById("carrito");
            if (carrito.thing.celiacos == "si"){
                filaTabla.innerHTML +=  '<tr id='+nuevoID+'><td>' + carrito.thing.producto +'</td><td>' + "$ " + carrito.thing.precio + '</td><td>' + "$ " + total + '</td><td class="botonBorrar"> <button class="botonBorrarTD" id="' + nuevoID+ '"> <i class="fa fa-trash-o"></i></button> <button class="botonEditarTD" id="' + nuevoID+ '"><i class="fa fa-edit"></i></button></td></tr>';
            }
            
            else{
               filaTabla.innerHTML +=  '<tr id='+nuevoID+' class="paraNOceliacos"><td>' + carrito.thing.producto +'</td><td>' + "$ " + carrito.thing.precio + '</td><td>' + "$ " + total + '</td><td class="botonBorrar"> <button class="botonBorrarTD" id="' + nuevoID+ '"> <i class="fa fa-trash-o"></i></button> <button class="botonEditarTD" id="' + nuevoID+ '"><i class="fa fa-edit"></i></button></td></tr>';
            }

            
            boton_editar_fila();  
            boton_borrar_fila();
           
    }


 //FUNCION QUE ELIMINA TODAS LOS JSNON DE LA API EXCEPTO LOS PRECARGADOS


    function eliminar_toda_la_API () {

        fetch("https://web-unicen.herokuapp.com/api/groups/103FerminMedinaAgustinArleo/viandas",{

        })
        
        .then(function(r){

            if (!r.ok) {
                console.log("error")
            }
            return r.json()

        })
        
        .then(function (json) {

            let nuevoID;

            for (let i = 2; i <= (json.viandas.length); i++) {  
                
                nuevoID = json.viandas[i]._id;                 

                fetch('https://web-unicen.herokuapp.com/api/groups/103FerminMedinaAgustinArleo/viandas/'+ nuevoID, {
                
                    'method': 'DELETE',
                    'mode': "cors"

                })
                
                .then(function(r){

                    return r.json()

                })
                
                .then(function(json){
                    
                    console.log("Borrado exitoso!");
                    location.reload(); //ESTO HABRIA QUE ARREGLARLO PARA QUE NO RECARGUE LA PAGINA PERO POR AHORA ESTA BIEN
                    
                })
                
                .catch(function(e){

                    console.log(e)

                })
            }

        })

        .catch (function(e) {

            console.log(e)

        })

    }


 //FUNCION DEL BOTON EDITAR FILAS


    function boton_editar_fila(){
                    
        fetch('https://web-unicen.herokuapp.com/api/groups/103FerminMedinaAgustinArleo/viandas/', {

        })
        
        .then(function(r){

            return r.json()

        })
        
        .then(function(json){
            
            let buttons = document.getElementsByClassName('botonEditarTD'); 

            for(let i = 0; i<buttons.length; i++) {          //con este for hago que todos los botones con la clase botoneditarTD funcionen
    
                buttons[i].addEventListener('click', () => {  

                    
                    console.log("este funciono! tocaste el boton: " + i);
                    console.log(json);
                    
                    let carro = document.getElementById('carrito');
                    let child = carro.childNodes[i + 1];  //child nodes es como el "hijo" de carrito es decir los tr. entonces deoende el boton que toco se edita ese en especifico.                            
                    child.innerHTML = '<td><a class="textoInput2"> Vianda: <input type="text" id="productoNuevo"> </a></td><td><a class="textoInput2"> Precio: <input type="number" id="precioNuevo"> </a></td><td><a class="textoInput2"><div class="filtro"><input type="checkbox" id="btn-celiacos2"><label for="btn-celiacos2" class="celiacos">Para celiacos</label></div></a></td><td class="botonBorrar"> <button class="botonBorrarTD" id="' + json.viandas[i]._id + '"> <i class="fa fa-trash-o"></i></button><button type="button" id="edicionTerminada">Edicion terminada!</button></td>';
                    boton_borrar_fila();
                    
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
        
        })
        
        .catch (function(e) {
            console.log(e)
        });
        
    }


 //FUNCION QUE EDITA EL JSON EN LA API


    function editarTablaServidor(nuevoCarrito, idFila, child){
        
        fetch('https://web-unicen.herokuapp.com/api/groups/103FerminMedinaAgustinArleo/viandas/' + idFila, { 

            'method': 'PUT',                            //SE EDITA EN EL SERVIDOR
            "mode": 'cors',                                                                         
            'headers': {'Content-Type': 'application/json'},
            'body': JSON.stringify(nuevoCarrito)
            
        })
        
        .then(function(r){

            if (!r.ok){
                console.log("ERROR!")
            }
            return r.json();

        })
        
        .then(function(json){

            //child.innerHTML = '<tr id='+ idFila +'><td>' + nuevoCarrito.thing.producto +'</td><td>' + "$ " + nuevoCarrito.thing.precio + '</td><td>' + "$ " + total + '</td><td class="botonBorrar"> <button class="botonBorrarTD" id="' + idFila + '"> <i class="fa fa-trash-o"></i></button> <button class="botonEditarTD" id="' + idFila + '"><i class="fa fa-edit"></i></button></td></tr>';
            location.reload();              

        })
        
        .catch(function(e){
            console.log(e);
        })

    }


 //FUNCION DE BOTON BORRAR FILA
    

    function boton_borrar_fila () { 

    let filas = document.querySelectorAll('tr');
    let buttons = document.getElementsByClassName('botonBorrarTD'); 

        for (let i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', function() {
                console.log("Fila eliminada: " + filas[i+1].id);
                borrarFila_en_servidor(filas[i+1].id, filas[i+1]);
                filas[i+1].remove()
            })
            
        }
    }
 

 //FUNCION QUE BORRA EN LA API EL JSON DE LA FILA QUE SE BORRO


    function borrarFila_en_servidor(idFila, fila) {

        fetch('https://web-unicen.herokuapp.com/api/groups/103FerminMedinaAgustinArleo/viandas/'+ idFila,{
            
            'method': 'DELETE',
            'mode': "cors"

        })
        
        .then(function(r){

            if (!r.ok) {
                console.log("error")
            }
            return r.json()

        })
        
        .then(function(json){  
            console.log("Borrado exitoso!");
            let filas = document.querySelectorAll('tr');
            let buttons = document.getElementsByClassName('botonBorrarTD');     
            let numFila = fila;

            for (let i = numFila; i < buttons.length; i++) {
                let carro = document.getElementById('carrito');
                let child = carro.childNodes[i + 1].innerHTML= '';
                
                child.innerHTML
            }

        })

        .catch (function(e) {

            console.log(e)

        })
    }
            


 //BOTON FILTRO
 
    document.querySelector("#btn-filtro").addEventListener("click", function () { //ACA YA TE PREPARE LA FUNCION DEL FILTRO2

        let filaNOceliacos = document.getElementsByClassName('paraNOceliacos'); 
                
        for(let i = 0; i < filaNOceliacos.length; i++){
            
            filaNOceliacos[i].classList.toggle("desaparecer");

            console.log("Se estan mostrando los alimentos para celiacos!")
        }

    })

    


}