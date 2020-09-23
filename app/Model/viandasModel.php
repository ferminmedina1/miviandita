<?php 


class viandasModel{
    private $db;


    function __construct() { //Preguntar sobre esto
        // 1. Abro la conexión
       $this->db = $this->connect();//Preguntar sobre esto
   }

    private function connect(){
        // Conecta a la DB
        $db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', 'root');
        return $db;
    }

    function getViandasByTipo($tipo) {
        $query = $this->db->prepare('SELECT * FROM viandas WHERE tipo = ?');
        $query->execute([$tipo]); // array($tipo) PREGUNTAR SORBRE EL EXECUTE.
        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }

    function getTipos(){ 
        // DISTINCT no trae elementos repetidos. En este caso traera todos los generos existentes.
        $query = $this->db->prepare('SELECT DISTINCT tipo FROM viandas'); 
        $query->execute(); 
        $tipos = $query->fetchAll(PDO::FETCH_OBJ);
        return $tipos;
    } 
    
    function getViandas() {
        $query = $this->db->prepare('SELECT * FROM viandas');
        $query->execute();
        $viandas = $query->fetchAll(PDO::FETCH_OBJ);
        return $viandas;
    }
    
    function insertVianda($nombre,$tipo,$celiacos){
        $query = $this->db->prepare('INSERT INTO viandas(nombre,tipo,celiacos) VALUES (?,?,?)');
        $query->execute([$nombre,$tipo,$dietetico]);
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