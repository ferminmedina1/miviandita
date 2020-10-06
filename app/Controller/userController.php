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
            function Log(){//////////////MEJORAR PARA VIANDAS
                $this->view->ShowLog();
            }

            function Register(){//////////////MEJORAR PARA VIANDAS
                $this->view->ShowRegister();
            }

            function VerifyUser(){
                $user = $_POST["input_user"];
                $pass = $_POST["input_pass"];
        
                if(isset($user)){
                    $userFromDB = $this->model->GetUser($user);
                    if(isset($userFromDB) && $userFromDB){ //PREGUNTAR SOBRE ESTE &&
                        if (password_verify($pass, $userFromDB->password)){
        
                            session_start();
                            $_SESSION["EMAIL"] = $userFromDB->email;
                            $_SESSION['LAST_ACTIVITY'] = time();
        
                            header("Location: ".BASE_URL."home");
                        }else{
                            $this->view->ShowLog("Contraseña incorrecta");
                        }
        
                    }else{
                        // No existe el user en la DB
                        $this->view->ShowLog("El usuario no existe");
                    }
                }
            }
            function addUser(){
                $email = $_POST["email"];
                $pass_input = $_POST["pass"];
                $hash = password_hash($pass_input, PASSWORD_DEFAULT);
                
                if(isset($_POST["email"]) && isset($_POST["pass"])){
                $this->model->addUserDB($email,$hash);
                $this->view->showLog("Se registro el usuario correctamente");
                }else{
                    $this->view->showRegister("Ingresa los datos correspondientes.");
                }

            }        
    }