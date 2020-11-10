<?php

require_once("./libs/smarty/Smarty.class.php");

class userView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url',BASE_URL);
    }
    
 //MUESTRA EL FORMULARIO DE LOGIN
    function ShowLog($mensaje = ""){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('../templates/log.tpl');
    }

 //MUESTRA EL FORMULARIO DE REGISTER
    function ShowRegister($mensaje = ""){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('../templates/register.tpl');
    }

    function showUsers($usuarios){
        $this->smarty->assign("usuarios", $usuarios);
        $this->smarty->display('../templates/adminUsers.tpl');
    }

    function showFormUser($usuario){
        $this->smarty->assign("usuario", $usuario);
        $this->smarty->display('../templates/formEditarUser.tpl');
    }

    function showAdminUsersLocation(){
        header("Location: ".BASE_URL."administracion/usuarios");
    }
}
?>