<?php 

class categoriasModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

 //SE OBTIENEN TODAS LAS VIANDAS DE UNA DETERMINADA CATEGORIA
    function getViandasByDirigidoA($dirigidoA) {
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA WHERE id_dirigidoA = ?');
        $query->execute([$dirigidoA]); 
        $viandaDirigidas = $query->fetchAll(PDO::FETCH_OBJ);
        return $viandaDirigidas;
    }

 //SE OBTIENEN TODAS LAS CATEGORIAS
    function getCategoria(){ 
        $query = $this->db->prepare('SELECT * FROM dirigido_table');
        $query->execute(); 
        $dirigidoA = $query->fetchAll(PDO::FETCH_OBJ);
        return $dirigidoA;
    }

 //TRAE LOS DATOS DE UNA DETERMINADA CATEGORIA
    function getCategoriaByID($id){
        $query = $this->db->prepare('SELECT * FROM dirigido_table WHERE id_dirigidoA = ?');
        $query->execute([$id]);
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }

 //SE INSERTA UNA NUEVA CATEGORIA EN LA DB
    function insertCategoria($tipo_vianda){
        $query = $this->db->prepare('INSERT INTO dirigido_table(tipo_vianda) VALUES (?)');
        $query->execute([$tipo_vianda]);
    }
    
 //SE ELIMINA UNA DETERMINADA CATEGORIA DE LA DB
    function deleteCategoria($id) {
        $sentencia = $this->db->prepare("DELETE dirigido_table,viandas FROM dirigido_table JOIN viandas ON dirigido_table.id_dirigidoA=viandas.id_dirigidoA WHERE viandas.id_dirigidoA= ?");
        $sentencia->execute(array($id));
       
        $sentencia = $this->db->prepare("DELETE FROM dirigido_table WHERE id_dirigidoA=?");
        $sentencia->execute(array($id));
    }
    
 //SE ACTUALIZA UNA DETERMINADA CATEGORIA
    function updateCategoria($nombre,$id){
        $query = $this->db->prepare("UPDATE dirigido_table SET tipo_vianda=? WHERE id_dirigidoA = ?");
        $query->execute(array($nombre,$id));
    }
}   
?>