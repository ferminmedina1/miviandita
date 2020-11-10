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

 //MUESTRA LAS VIANDAS ASOCIADAS A UNA CATEGORIA
    function mostrarPorCategoria($params = null) {
        $categoria = $params[":TIPO_VIANDA"];
        $viandas = $this->modelCategorias->getViandasByDirigidoA($categoria);
        $this->viewCategorias->showViandaByCategoria($categoria, $viandas);
    }

    function adminCategorias(){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){

            $categorias = $this->modelCategorias->getCategoria();
            $this->viewCategorias->ShowAdminCategorias($categorias);
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

 //AGREGA UNA NUEVA CATEGORIA
    function nuevaCategoria(){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){ 
            if (!empty($_POST['tipo_vianda'])){
                $this->modelCategorias->insertCategoria($_POST['tipo_vianda']);
            }
            $this->viewCategorias->showAdminCategoriasLocation();
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

 //ELIMINA UNA DETERMINADA CATEGORIA
    function eliminarCategoria($params = null){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){ 
            $categoria_ID = $params[':ID'];
            $this->modelCategorias->deleteCategoria($categoria_ID);
            $this->viewCategorias->showAdminCategoriasLocation();
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

 //MUESTRA EL FORMULARIO EDITAR CATEGORIA
    function showFormEditarCategoria($params = null){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){ 
            $idCategoria = $params[":ID"];
            $categoria = $this->modelCategorias->getCategoriaByID($idCategoria);
            $this->viewCategorias->showFormularioEditarCategoria($categoria);
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

 //EDITA LA CATEGORIA EN LA DB    
    function editarCategoria($params = null){
        $admin = $this->verificarSiESAdmin();

        if ($admin == True){ 
            $categoria_ID = $params[':ID']; 
            if((!empty($_POST['nombre']))) {
                $this->modelCategorias->updateCategoria($_POST['nombre'], $categoria_ID);
            }
            $this->viewCategorias->showAdminCategoriasLocation();   
        }
        else{
            header("Location: ".LOGIN);
            die();
        }
    }

 //BARRERA DE SEGURIDAD DEL CONTROLLER
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
?>