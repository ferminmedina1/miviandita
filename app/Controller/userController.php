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
            function Log(){
                $this->view->ShowLog();
            }

            function Register(){
                $this->view->ShowRegister();
            }

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
        
                    }else{      //SI EL USUARIO NO EXISTE EN LA DB
                        $this->view->ShowLog("El usuario no existe"); 
                    }
                }
            }
            function addUser(){
                $email = $_POST["email"];
                $pass_input = $_POST["pass"];
                $rol = $_POST["rol"];
                $hash = password_hash($pass_input, PASSWORD_DEFAULT);
                
                if(isset($_POST["email"]) && isset($_POST["pass"])){
                    
                    $this->model->addUserDB($email,$hash,$rol);
                    $this->view->showLog("Se registro el usuario correctamente");
                }else{
                    $this->view->showRegister("Ingresa los datos correspondientes.");
                }

            }

            function Logout(){
                session_start();
                session_destroy();
                header("Location: ".BASE_URL."home");
            }
    }