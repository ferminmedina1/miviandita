<?php

require_once("./libs/smarty/Smarty.class.php");

class viandasView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url',BASE_URL);
    }

    function ShowHome(){
        $this->smarty->display('../templates/home.tpl');
    }

    function ShowViandas($categorias){
        $this->smarty -> assign('tipo', $categorias);
        $this->smarty->display('../templates/viandas.tpl');
    }


    function showAllViandas($viandas) {
        $this->smarty -> assign('allViandas', $viandas);
        $this->smarty->display('../templates/AllViandas.tpl');
    }

    function ShowPromo(){
        $this->smarty->display('../templates/promo.tpl');
    }

    function ShowContacto(){
        $this->smarty->display('../templates/contacto.tpl');
    }

    function ShowSobre(){
        $this->smarty->display('../templates/sobre.tpl');
    }

    function ShowIlvero(){
        $this->smarty->display('../templates/Ilvero/Ilvero.tpl');
    }

    function ShowConsultas(){
        $this->smarty->display('../templates/consultas.tpl');
    }

    function ShowAdminViandas($categorias,$viandas){
        $this->smarty -> assign('tipo', $categorias);
        $this->smarty -> assign('allViandas', $viandas);
        $this->smarty->display('../templates/adminViandas.tpl');
    }

    function showFormularioEditar($vianda,$categorias){
        $this->smarty -> assign('tipo', $categorias);
        $this->smarty -> assign('vianda', $vianda);
        $this->smarty->display('../templates/formEditar.tpl');
    }
    
    function showHomeLocation(){
        header("Location: ".BASE_URL."Home");
    }

    function showAdminLocation(){
        header("Location: ".BASE_URL."adminViandas");
    }
}


?>