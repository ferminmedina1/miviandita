<div class="calificacionYComentario">

        <h3 class="calificacion"> Calificar vianda </h3>

        <form id="formulario" method="post" action="calificarVianda">
            <p class="clasificacion">
                <input required id="radio1" type="radio" name="calificacion" value="5"><!--
                --><label for="radio1">★</label><!--
                --><input id="radio2" type="radio" name="calificacion" value="4"><!--
                --><label for="radio2">★</label><!--
                --><input id="radio3" type="radio" name="calificacion" value="3"><!--
                --><label for="radio3">★</label><!--
                --><input id="radio4" type="radio" name="calificacion" value="2"><!--
                --><label for="radio4">★</label><!--
                --><input id="radio5" type="radio" name="calificacion" value="1"><!--
                --><label for="radio5">★</label>
            </p>

            <div class="comentarioYBoton">
                <textarea id="textComentario" required name="comentario" rows="8" cols="40" value="" placeholder="Dejenos sus comentarios"></textarea>
                <input type="submit" id="btnEnviar" value="CALIFICAR">
            </div>
        </form>
    </div>    