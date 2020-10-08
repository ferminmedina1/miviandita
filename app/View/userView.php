<?php

require_once("./libs/smarty/Smarty.class.php");

class userView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url',BASE_URL);
    }
    
    function ShowLog($mensaje = ""){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('../templates/log.tpl');
    }

    function ShowRegister($mensaje = ""){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('../templates/register.tpl');
    }
}
?>