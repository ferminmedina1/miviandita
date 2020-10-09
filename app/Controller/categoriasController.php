<?php 

require_once "./app/View/viandasView.php";
require_once "./app/Model/viandasModel.php";
require_once "./app/View/categoriasView.php";
require_once "./app/Model/categoriasModel.php";
require_once "./app/Controller/userController.php";

class categoriasController{

    private $viewCategorias;
    private $modelCategorias;

    function __construct(){
        $this->viewViandas = new viandasView();
        $this->modelViandas = new viandasModel();
        $this->viewCategorias = new categoriasView();
        $this->modelCategorias = new categoriasModel();
        $this->checkLoggedIn();     //SE INICIA EN EL CONSTRUCTOR PARA QUE EN TODAS LAS PAGINAS HAYA UNA SESION
    }

 //MUESTRA LAS CATEGORIAS EN LA SECCION VIANDAS
    function categorias(){
        $categorias = $this->modelCategorias->getCategoria();
        $this->viewCategorias->ShowCategorias($categorias);
    }

 //MUESTRA LAS VIANDAS DE UNA DETERMINADA CATEGORIA
    function mostrarPorCategoria($params = null) {
        $categoria = $params[":TIPO_VIANDA"];
        $viandas = $this->modelCategorias->getViandasByDirigidoA($categoria);
        $this->viewCategorias->showViandaByCategoria($categoria, $viandas);
    }

 //AGREGA UNA NUEVA CATEGORIA
    function nuevaCategoria(){
        $this->verificarSiESAdmin();
        if (!empty($_POST['tipo_vianda'])){
            $this->modelCategorias->insertCategoria($_POST['tipo_vianda']);
        }
        $this->viewViandas->showAdminLocation();
    }

 //ELIMINA UNA DETERMINADA CATEGORIA
    function eliminarCategoria($params = null){
        $this->verificarSiESAdmin();
        $categoria_ID = $params[':ID'];
        $this->modelCategorias->deleteCategoria($categoria_ID);
        $this->viewViandas->showAdminLocation();
    }

 //MUESTRA EL FORMULARIO EDITAR CATEGORIA
    function showFormEditarCategoria($params = null){
        $this->verificarSiESAdmin();
        $idCategoria = $params[":ID"];
        $categoria = $this->modelCategorias->getCategoriaByID($idCategoria);
        $this->viewCategorias->showFormularioEditarCategoria($categoria);
    }

 //EDITA LA CATEGORIA EN LA DB    
    function editarCategoria($params = null){
        $this->verificarSiESAdmin();
        $categoria_ID = $params[':ID']; 
        if((!empty($_POST['nombre']))) {
            $this->modelCategorias->updateCategoria($_POST['nombre'], $categoria_ID);
        }
        $this->viewViandas->showAdminLocation();   
    }

 //BARRERA DE SEGURIDAD DEL CONTROLLER
    private function checkLoggedIn(){
        session_start();                    //SE INICIA UNA SESION
        if(!isset($_SESSION["EMAIL"])){     //SI NO ESTA SETEADO EL EMAIL (NO HAY USUARIO LOGUEADO)
            $_SESSION["ROL"] = "visitante"; //SE LE ASIGNA UN ROL A CUALQUIERA QUE ACCEDA A LA PAGINA
        }
        else{
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {    //SE VERIFICA LA ULTIMA ACCION EN LA PAGINA, SI ES MAYOR A 30m SE CIERRA LA SESION
                header("Location: ".LOGOUT);    //CIERRA LA SESION
                die();
            } 
            $_SESSION['LAST_ACTIVITY'] = time();    //SE ACTUALIZA EL TIEMPO
        }  
    }

 //VERIFICA SI EL USUARIO EN LA SESION ES ADMIN
    private function verificarSiESAdmin(){
        if(isset($_SESSION["ROL"]) && ($_SESSION["ROL"] != "administrador")){
            header("Location: ".LOGIN);
            die();
        }
    }
}
?>