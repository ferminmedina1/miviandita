<?php

require_once("./libs/smarty/Smarty.class.php");

class categoriasView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url',BASE_URL);
    }
    
    function showViandaByCategoria ($categoria, $viandas) {
        $this->smarty -> assign('titulo_tipo', $categoria);
        $this->smarty -> assign('viand', $viandas);
        $this->smarty->display('../templates/viandasByCategoria.tpl');
    }

    function showFormularioEditarCategoria($categoria){
        $this->smarty -> assign('tipo', $categoria);
        $this->smarty->display('../templates/formEditarCategoria.tpl');
    }

}
?>