<?php 

require_once "./app/View/userView.php";
require_once "./app/Model/userModel.php";
    
class userController{
    private $view;
    private $model;

    function __construct(){
        $this->view = new userView();
        $this->model = new userModel();
    }

 //MUESTRA EL FORMULARIO LOGIN
    function Log(){     
        $this->view->ShowLog();
    }

 //MUESTRA EL FORMULARIO REGISTER
    function Register(){
        $this->view->ShowRegister();
    }

 //VERIFICA QUE EL USUARIO EXISTA
    function VerifyUser(){
        $user = $_POST["input_user"];
        $pass = $_POST["input_pass"];

        if(isset($user)){
            $userFromDB = $this->model->GetUser($user);
            if(isset($userFromDB) && $userFromDB){ //PREGUNTAR SOBRE ESTE &&

                if (password_verify($pass, $userFromDB->password)){ 

                    session_start();    //SE INICIA UNA SESION
                    $_SESSION["EMAIL"] = $userFromDB->email;    //SE TRAE EL EMAIL DEL USUARIO DESDE LA DB
                    $_SESSION["ROL"] = $userFromDB->rol;    //SE TRAE EL ROL DEL USUARIO DESDE LA DB
                    $_SESSION['LAST_ACTIVITY'] = time();    //ULTIMA ACTIVIDAD DURANTE LA SESION

                    header("Location: ".BASE_URL."home");
                }
                else{  //SI LA CONTRASEÑA ES INCORRECTA
                    $this->view->ShowLog("Contraseña incorrecta");
                }

            }
            else{      //SI EL USUARIO NO EXISTE EN LA DB
                $this->view->ShowLog("El usuario no existe"); 
            }
        }
    }

 //AGREGA UN USUARIO NUEVO
    function addUser(){

        $email = $_POST["email"];
        $pass_input = $_POST["pass"];
        $rol = $_POST["rol"];
        $hash = password_hash($pass_input, PASSWORD_DEFAULT);
        //SE VERIFICA QUE LOS CAMPOS NO ESTEN VACIOS
        if((isset($_POST["email"]) && !empty($_POST["email"])) && (isset($_POST["pass"]) && !empty($_POST["pass"]))){

            $existe = $this->verificarUsuario($email);  
        //SI EL USER NO EXISTE LO AGREGA A LA DB
            if ($existe == False) {        
                $this->model->addUserDB($email,$hash,$rol);
                $this->view->showLog("Se registro el usuario correctamente");
            }
            else{
                $this->view->showRegister("Usuario ya registrado");   
            }      
        }
        else{
            $this->view->showRegister("Ingresa los datos correspondientes");  
        }
    }

 //SI EL USUARIO EXISTE DEVUELVE TRUE, SINO FALSO
    function verificarUsuario($email){     
        $existe = False;
        $usuarios = $this->model->getAllUsers();
        foreach ($usuarios as $user) {
            if ($user->email == $email) {
                $existe = True;
            }
        }
        return $existe;
    }

 //CIERRA LA SESION
    function Logout(){
        session_start();
        session_destroy();
        header("Location: ".BASE_URL."home");
    }

}