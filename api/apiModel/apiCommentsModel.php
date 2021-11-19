<?php 

class apiCommentsModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

 //TRAE LOS COMENTARIOS POR EL ID DE LA VIANDA
    function getCommentsByVianda($idVianda){
     //SELECCIONAMOS QUE QUEREMOS QUE TRAIGA, JUNTA LAS DOS TABLAS Y LO BUSCA
        $query = $this->db->prepare('SELECT * FROM comentarios  INNER JOIN users ON comentarios.id_user = users.id_user WHERE comentarios.id_vianda = ?');
        $query->execute([$idVianda]);
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

 //TRAE TODOS LOS COMENTARIOS
    function getAllComments(){
     //SELECCIONAMOS QUE QUEREMOS QUE TRAIGA, JUNTA LAS DOS TABLAS Y TRAE TODOS LOS COMENTARIOS
        $query = $this->db->prepare('SELECT * FROM comentarios');
        $query->execute();
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

 //ELIMINA UN COMENTARIO POR SU ID
    function deleteComment($id_comentario) {
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id_comentario = ?');
        $query->execute([$id_comentario]);
        return $query->rowCount();
    }

 //AGREGA UN COMENTARIO
    function insertComment($comentario, $id_vianda, $calificacion, $id_user){

        $query = $this->db->prepare('INSERT INTO comentarios(calificacion, comentario, id_user, id_vianda) VALUES (?,?,?,?)');
    //CON EL RETURN SABEMOS SI LO AGREGO O NO, SI DEVUELVE 1 ES PORQUE LO AGREGA
        return $query->execute([$calificacion, $comentario, $id_user, $id_vianda]);
         
    }

     //TRAE LOS COMENTARIOS POR SU ID
    function getCommentById($idComment){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE comentarios.id_comentario = ?');
        $query->execute([$idComment]);
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    function updateComment($id, $comentario) {
        $query = $this->db->prepare("UPDATE comentarios SET comentario=? WHERE id_comentario = ?");
        return $query->execute([$comentario, $id]);
    }
}
