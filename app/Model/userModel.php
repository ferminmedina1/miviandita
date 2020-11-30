<?php 

class userModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

 //TRAE UN USUARIO MEDIANTE EL user
    function GetUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM users WHERE user=?");
        $sentencia->execute([$user]);
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

 //TRAE UN USUARIO MEDIANTE EL ID  
    function getUserByID($id){
        $sentencia = $this->db->prepare("SELECT * FROM users WHERE id_user=?");
        $sentencia->execute([$id]);
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }


 //OBTIENE TODOS LOS USUARIOS
    function getAllUsers(){
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

 //AGREGA UN USUARIO A LA BD
    function addUserDB($user,$hash,$rol){
        $query = $this->db->prepare('INSERT INTO users(user,password,rol) VALUES (?,?,?)');
        $query->execute([$user,$hash,$rol]);
    }

 //ELIMINA UN USUARIO
    function deleteUser($id_user) {
        echo $id_user;
        $query = $this->db->prepare("DELETE users,comentarios FROM users JOIN comentarios ON users.id_user = comentarios.id_user WHERE users.id_user = ?");
        $query->execute([$id_user]);

        $sentencia = $this->db->prepare('DELETE FROM users WHERE id_user=?');
        $sentencia->execute([$id_user]);

    }

    function updateRol($id_user, $nuevoRol){
        $query = $this->db->prepare("UPDATE users SET rol=? WHERE id_user = ?");
        $query->execute([$nuevoRol, $id_user]);
    }

}

?>