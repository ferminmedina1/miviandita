<?php

require_once("./libs/smarty/Smarty.class.php");

class viandasView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url',BASE_URL);
    }

 //SE MUESTRA EL HOME
    function ShowHome(){
        $this->smarty->display('../templates/home.tpl');
    }

 //SE MUESTRAN TODAS LAS VIANDAS
    function showAllViandas($viandas) {
        $this->smarty -> assign('allViandas', $viandas);
        $this->smarty->display('../templates/AllViandas.tpl');
    }

 //MUESTRA LA SECCION PROMO
    function ShowPromo(){
        $this->smarty->display('../templates/promo.tpl');
    }

 //MUESTRA LA SECCION CONTACTO
    function ShowContacto(){
        $this->smarty->display('../templates/contacto.tpl');
    }

 //MUESTRA LA SECCION SOBRE
    function ShowSobre(){
        $this->smarty->display('../templates/sobre.tpl');
    }

 //MUESTRA ILVERO
    function ShowIlvero(){
        $this->smarty->display('../templates/Ilvero/Ilvero.tpl');
    }

 //MUESTRA LA SECCION CONSULTAS
    function ShowConsultas(){
        $this->smarty->display('../templates/consultas.tpl');
    }

 //MUESTRA LA SECCION ADMINISTRACION
    function ShowAdminViandas($categorias,$viandas){
        $this->smarty -> assign('tipo', $categorias);
        $this->smarty -> assign('allViandas', $viandas);
        $this->smarty->display('../templates/adminViandas.tpl');
    }

 //MUESTRA EL FORMULARIO EDITAR VIANDA
    function showFormularioEditar($vianda,$categorias){
        $this->smarty -> assign('tipo', $categorias);
        $this->smarty -> assign('vianda', $vianda);
        $this->smarty->display('../templates/formEditar.tpl');
    }

 //REDIRECCIONA AL HOME
    function showHomeLocation(){
        header("Location: ".BASE_URL."Home");
    }

 //REDIRECCIONA A ADMINISTRACION
    function showAdminLocation(){
        header("Location: ".BASE_URL."administracion");
    }
}


?>