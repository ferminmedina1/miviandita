<?php 


class viandasModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

    function getViandasByDirigidoA($dirigidoA) {
        $query = $this->db->prepare('SELECT * FROM viandas WHERE dirigidoA = ?');
        $query->execute([$dirigidoA]); // array($dirigidoA) PREGUNTAR SORBRE EL EXECUTE.
        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }

    function getDirigidoA(){ 
        // DISTINCT no trae elementos repetidos. En este caso traera todos los generos existentes.
        $query = $this->db->prepare('SELECT DISTINCT dirigidoA FROM viandas'); 
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
    
    function insertVianda($nombre,$dirigidoA,$celiacos){
        $query = $this->db->prepare('INSERT INTO viandas(nombre,dirigidoA,celiacos) VALUES (?,?,?)');
        $query->execute([$nombre,$dirigidoA,$dietetico]);
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