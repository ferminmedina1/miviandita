<?php 


class userModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_miviandita;charset=utf8', 'root', '');
    }

    function GetUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $sentencia->execute([$user]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    
    function addUserDB($email,$hash){
        
        $query = $this->db->prepare('INSERT INTO users(email,password) VALUES (?,?)');
        $query->execute([$email,$hash]);
    }
}
?>