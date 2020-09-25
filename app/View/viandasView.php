<?php

    require_once"../libs/smarty/Smarty.class.php";
class viandasView{

    private $title;
    

    function __construct(){
        $this->title = "Lista de Viandas";
    }

    function ShowHome(){
        $smarty = new Smarty();
        $smarty->display('../templates/home.tpl');
    }

    function ShowViandas(){
        $smarty = new Smarty();
        $smarty->display('../templates/viandas.tpl');
    }

    function ShowPromo(){
        $smarty = new Smarty();
        $smarty->display('../templates/promo.tpl');
    }

    function ShowContacto(){
        $smarty = new Smarty();
        $smarty->display('../templates/contacto.tpl');
    }

    function ShowSobre(){
        $smarty = new Smarty();
        $smarty->display('../templates/sobre.tpl');
    }

    function ShowIlvero(){
        $smarty = new Smarty();
        $smarty->display('../templates/ilvero.tpl');
    }

    function ShowConsultas(){
        $smarty = new Smarty();
        $smarty->display('../templates/consultas.tpl');
    }

    function ShowLog(){
        $smarty = new Smarty();
        $smarty->display('../templates/log.tpl');
    }

    function ShowRegister(){
        $smarty = new Smarty();
        $smarty->display('../templates/register.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    
}


?>