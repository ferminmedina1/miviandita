<?php 

require_once "./app/View/userView.php";
require_once "./app/Model/userModel.php";
    
class userController{
    private $view;
    private $model;

    function __construct(){
        $this->view = new userView();
        $this->model = new userModel();
        $this->checkLoggedIn();
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
                    $_SESSION["user"] = $userFromDB->user;    //SE TRAE EL user DEL USUARIO DESDE LA DB
                    $_SESSION["ROL"] = $userFromDB->rol;    //SE TRAE EL ROL DEL USUARIO DESDE LA DB
                    //$_SESSION['LAST_ACTIVITY'] = time();    //ULTIMA ACTIVIDAD DURANTE LA SESION
                    $_SESSION["id_user"] = $userFromDB->id_user;
                    setcookie("id_user", $userFromDB->id_user); //SE CREA UNA COOKIE "id_user"
                    
                    header("Location: ".BASE_URL."home");
                    echo($_COOKIE["id_user"]);
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

        $user = $_POST["user"];
        $pass_input = $_POST["pass"];
        $rol = "cliente";
        $hash = password_hash($pass_input, PASSWORD_DEFAULT);
        //SE VERIFICA QUE LOS CAMPOS NO ESTEN VACIOS
        if((isset($_POST["user"]) && !empty($_POST["user"])) && (isset($_POST["pass"]) && !empty($_POST["pass"]))){

            $existe = $this->verificarUsuario($user);  
        //SI EL USER NO EXISTE LO AGREGA A LA DB
            if ($existe == False) {        
                $this->model->addUserDB($user,$hash,$rol);
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
    function verificarUsuario($usuario){     
        $existe = False;
        $usuarios = $this->model->getAllUsers();
        foreach ($usuarios as $user) {
            if ($user->user == $usuario) {
                $existe = True;
            }
        }
        return $existe;
    }

 //CIERRA LA SESION
    function logout(){
        session_start();
        session_destroy();
        if ( isset($_COOKIE['id_user']))        //SI ESTA SETEADA LA VARIABLE 
        setcookie("id_user", "", time() - 1 );  //SE ELIMINA
        header("Location: ".BASE_URL."home");
    }

    function adminUsuarios(){
        
        $admin = $this->verificarSiESAdmin();
        if ($admin == True){
            $usuarios = $this->model->getAllUsers();
            $this->view->showUsers($usuarios);
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

    function eliminarUsuario($params = null){

        $admin = $this->verificarSiESAdmin();
        if ($admin == True){ 
            $id_user = $params[':ID'];
            $this->model->deleteUser($id_user);
            $this->view->showAdminUsersLocation();
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

    function showFormEditarUser($params = null){
        
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){ 
            $id_user = $params[':ID'];
            $usuario = $this->model-> getUserByID($id_user);
            $this->view->showFormUser($usuario);
            
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

    function editarRol($params = null){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){
            $id_user = $params[':ID'];
            $this->model->updateRol($id_user, $_POST["rol"]);
            if($_SESSION["id_user"] == $id_user)
                $_SESSION["ROL"] = $_POST["rol"];
            $this->view->showAdminUsersLocation();
            
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

    private function checkLoggedIn(){
        session_start();                    //SE INICIA UNA SESION
        if(!isset($_SESSION["user"])){     //SI NO ESTA SETEADO EL user (NO HAY USUARIO LOGUEADO)
            $_SESSION["ROL"] = "visitante"; //SE LE ASIGNA UN ROL A CUALQUIERA QUE ACCEDA A LA PAGINA
        }
    }

 //VERIFICA SI EL USUARIO EN LA SESION ES ADMIN
    private function verificarSiESAdmin(){
        if((isset($_SESSION["ROL"])) && ($_SESSION["ROL"] != "administrador")){
            $admin = False;
        }
        else{
            $admin = True;
        }
        return $admin;
    }
}