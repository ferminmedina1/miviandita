<?php 

class categoriasModel{
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

    function insertCategoria($tipo_vianda){
        $query = $this->db->prepare('INSERT INTO dirigido_table(tipo_vianda) VALUES (?)');
        $query->execute([$tipo_vianda]);
    }
    
    function deleteCategoria($id) {
        $sentencia = $this->db->prepare("DELETE FROM dirigido_table WHERE id_dirigidoA= ?");
        $sentencia->execute(array($id));
        
    }
    
    function updateCategoria($nombre,$id){
        $query = $this->db->prepare("UPDATE dirigido_table SET tipo_vianda='$nombre' WHERE id_dirigidoA = ?");
        $query->execute(array($id));
    }
}   
?>