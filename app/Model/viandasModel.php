<?php 

class viandasModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

    function getViandaByID($id){
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA WHERE id_vianda = ?');
        $query->execute([$id]);
        $vianda = $query->fetchAll(PDO::FETCH_OBJ);
        return $vianda;
    }

    function getViandas() {
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA');
        $query->execute();
        $viandas = $query->fetchAll(PDO::FETCH_OBJ);
        return $viandas;
    }

    function insertVianda($nombre,$descripcion,$precio,$dirigidoA){
        
        $query = $this->db->prepare('INSERT INTO viandas(nombre,descripcion,precio,id_dirigidoA) VALUES (?,?,?,?)');
        $query->execute([$nombre,$descripcion,$precio,$dirigidoA]);
    }
    
    function deleteVianda($id){
        $sentencia = $this->db->prepare("DELETE FROM viandas WHERE id_vianda=?");
        $sentencia->execute(array($id));
    }
    
    function updateVianda($nombre,$descripcion,$precio,$dirigidoA,$id){
        $query = $this->db->prepare("UPDATE viandas SET nombre='$nombre', precio='$precio', id_dirigidoA='$dirigidoA', descripcion='$descripcion' WHERE id_vianda = ?");
        $query->execute(array($id));
    }

}



?>