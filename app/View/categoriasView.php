<?php

require_once("./libs/smarty/Smarty.class.php");

class categoriasView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url',BASE_URL);
    }

 //MUESTRA TODAS LAS CATEGORIAS
    function ShowCategorias($categorias){
        $this->smarty -> assign('tipo', $categorias);
        $this->smarty->display('../templates/viandas.tpl');
    }
    
 //MUESTRA LAS VIANDAS POR CATEGORIA
    function showViandaByCategoria ($categoria, $viandas) {
        $this->smarty -> assign('titulo_tipo', $categoria);
        $this->smarty -> assign('viand', $viandas);
        $this->smarty->display('../templates/viandasByCategoria.tpl');
    }

 //MUESTRA EL FORMULARIO EDITAR CATEGORIA
    function showFormularioEditarCategoria($categoria){
        $this->smarty -> assign('tipo', $categoria);
        $this->smarty->display('../templates/formEditarCategoria.tpl');
    }

}

?>