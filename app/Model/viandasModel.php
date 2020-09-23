<?php 


class viandasModel{
    private $db;

    public function getDataBase()
    {
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=db_movies;charset=utf8', 'root', '');
    }

    function getViandasByTipo($tipo) {
        $query = $this->db->prepare('SELECT * FROM viandas WHERE genre = ?');
        $query->execute([$tipo]); // array($genre)
        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
}



?>