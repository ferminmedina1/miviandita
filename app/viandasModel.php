<?php 


class viandasModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

    function getViandasByDirigidoA($dirigidoA) {
        $query = $this->db->prepare('SELECT * FROM viandas INNER JOIN dirigido_table ON viandas.id_dirigidoA=dirigido_table.id_dirigidoA WHERE tipo_vianda = ?');
        $query->execute([$dirigidoA]); // array($dirigidoA) PREGUNTAR SORBRE EL EXECUTE.
        $viandaDirigidas = $query->fetchAll(PDO::FETCH_OBJ);
        return $viandaDirigidas;
    }

    function getCategoria(){ 
        // DISTINCT no trae elementos repetidos. En este caso traera todos los generos existentes.
        $query = $this->db->prepare('SELECT * FROM dirigido_table');
        $query->execute(); 
        $dirigidoA = $query->fetchAll(PDO::FETCH_OBJ);
        return $dirigidoA;
    }


    function getViandas() {
        $query = $this->db->prepare('SELECT * FROM viandas');
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
        $sentencia = $this->db->prepare("DELETE FROM viandas WHERE id=?");
        $sentencia->execute(array($id));
    }

    function marcarCeliaca($id){
        $sentencia = $this->db->prepare("UPDATE viandas SET celiacos=1 WHERE id=?");
        $sentencia->execute(array($id));
    }
}



?>