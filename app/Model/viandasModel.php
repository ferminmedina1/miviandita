<?php 

class viandasModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=db_miviandita;'.'dbname=db_miviandita;charset=utf8', 'root', 'tudai');
    }

  //SE OBTIENE UNA DETERMINADA VIANDA
    function getViandaByID($id){
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA WHERE id_vianda = ?');
        $query->execute([$id]);
        $vianda = $query->fetch(PDO::FETCH_OBJ);
        return $vianda;
    }

 //SE OBTIENEN TODAS LAS VIANDAS
    function getViandas() {
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table WHERE viandas.id_dirigidoA=dirigido_table.id_dirigidoA');
        $query->execute();
        $viandas = $query->fetchAll(PDO::FETCH_OBJ);
        return $viandas;
    }

 //INSERTA UNA NUEVA VIANDA
    function insertVianda($nombre,$descripcion,$precio,$dirigidoA,$img){
        $query = $this->db->prepare('INSERT INTO viandas(nombre,descripcion,precio,id_dirigidoA,imagen) VALUES (?,?,?,?,?)');
        $query->execute([$nombre,$descripcion,$precio,$dirigidoA,$img]);
    }
    
 //ELIMINA UNA DETERMINADA VIANDA
    function deleteVianda($id){
        $sentencia = $this->db->prepare("DELETE FROM viandas WHERE id_vianda=?");
        $sentencia->execute(array($id));
    }

     //ELIMINA UNA DETERMINADA VIANDA
     function deleteImageVianda($id){
        $sentencia = $this->db->prepare("UPDATE viandas SET imagen=? WHERE id_vianda=?");
        $sentencia->execute(array('',$id));
    }
    
 //ACTUALIZA UNA VIANDA
    function updateVianda($nombre,$descripcion,$precio,$dirigidoA,$id,$img){
        $query = $this->db->prepare("UPDATE viandas SET nombre=?, precio=?, id_dirigidoA=?, descripcion=?, imagen=? WHERE id_vianda = ?");
        $query->execute(array($nombre,$precio,$dirigidoA,$descripcion,$img,$id));
    }

}

?>