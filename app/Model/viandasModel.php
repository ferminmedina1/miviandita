<?php 

class viandasModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

    function getViandasByDirigidoA($dirigidoA) {
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA WHERE tipo_vianda = ?');
        $query->execute([$dirigidoA]); 
        $viandaDirigidas = $query->fetchAll(PDO::FETCH_OBJ);
        return $viandaDirigidas;
    }

    function getViandaByID($id){
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA WHERE id_vianda = ?');
        $query->execute([$id]);
        $vianda = $query->fetchAll(PDO::FETCH_OBJ);
        return $vianda;
    }

    function getCategoria(){ 
        $query = $this->db->prepare('SELECT * FROM dirigido_table');
        $query->execute(); 
        $dirigidoA = $query->fetchAll(PDO::FETCH_OBJ);
        return $dirigidoA;
    }

    function getCategoriaByID($id){
        $query = $this->db->prepare('SELECT * FROM dirigido_table WHERE id_dirigidoA = ?');
        $query->execute([$id]);
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }

    function getViandas() {
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA');
        $query->execute();
        $viandas = $query->fetchAll(PDO::FETCH_OBJ);
        return $viandas;
    }

    function insertCategoria($tipo_vianda){
        $query = $this->db->prepare('INSERT INTO dirigido_table(tipo_vianda) VALUES (?)');
        $query->execute([$tipo_vianda]);
    }
    
    function insertVianda($nombre,$descripcion,$precio,$dirigidoA){
        
        $query = $this->db->prepare('INSERT INTO viandas(nombre,descripcion,precio,id_dirigidoA) VALUES (?,?,?,?)');
        $query->execute([$nombre,$descripcion,$precio,$dirigidoA]);
    }

    function deleteVianda($id){
        $sentencia = $this->db->prepare("DELETE FROM viandas WHERE id_vianda=?");
        $sentencia->execute(array($id));
    }

    function deleteCategoria($id) {
        $sentencia = $this->db->prepare("DELETE dirigido_table,viandas
        FROM dirigido_table JOIN viandas ON dirigido_table.id_dirigidoA=viandas.id_dirigidoA WHERE viandas.id_dirigidoA= ?");
        $sentencia->execute(array($id));
    }

    function updateVianda($nombre,$descripcion,$precio,$dirigidoA,$id){
        $query = $this->db->prepare("UPDATE viandas SET nombre='$nombre', precio='$precio', id_dirigidoA='$dirigidoA', descripcion='$descripcion' WHERE id_vianda = ?");
        $query->execute(array($id));
    }

    function updateCategoria($nombre,$id){
        $query = $this->db->prepare("UPDATE dirigido_table SET tipo_vianda='$nombre' WHERE id_dirigidoA = ?");
        $query->execute(array($id));
    }
}



?>