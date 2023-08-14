<?php
require_once 'model/dao/ProductoDAO.php';
require_once 'model/dto/Producto.php';

class ProductoController
{

    private $model;

    public function __construct()
    { // constructor
        $this->model = new ProductoDAO();
    }



    public function index()
    {
        $titulo = "Lista de Productos";
        $resultados = $this->model->selectAll("");     
   
        require_once V_PRODUCTOS . 'productos.list.php';
       
    }
    

    public function search()
    {
        $titulo = "Lista de Productos";
        $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
        $resultados = $this->model->selectAll($parametro);
        require_once V_PRODUCTOS . 'list.php';
    }

    public function searchAjax()
    {
        $titulo = "Lista de usuarios";
        $parametro = (!empty($_GET["b"])) ? htmlentities($_GET["b"]) : "";
        $resultados =  $this->model->selectAll($parametro);
        echo json_encode($resultados);
    }

    public function view_new()
    {
        // Comunicarse con el modelo de Producto
        $modeloProd = new ProductoDAO();
        $categorias = $modeloProd->selectAll("");  
        
   
        $titulo = "Nuevo Producto";
        require_once V_PRODUCTOS . 'productos.new.php';
    }
    

    public function new()
    {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

            $msj = 'Producto guardado exitosamente.';
            $color = 'primary';

            if (!empty($_POST['nombre']) && !empty($_POST['precio'])) {

                $prod = new Producto();
                // lectura de parametros
                $prod->setNombre(htmlentities($_POST['nombre']));
                $prod->setPrecio(htmlentities($_POST['precio']));

                //comunicar con el modelo
                $exito = $this->model->insert($prod);

                if (!$exito) {
                    $msj = "No se pudo guardar correctamente.";
                    $color = "danger";
                }
            } else {
                $msj = "EMPTY POST.";
                $color = "danger";
            }

            if (!isset($_SESSION)) {
                session_start();
            };

            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;

            header('Location:index.php?c=Producto&f=index');
        }
    }

    public function view_edit()
    {
        //leer parametro
        $titulo = "Editar Producto";

        $id = $_REQUEST['id']; // verificar, limpiar

        $prod = $this->model->selectOne($id);

        $modeloCat = new ProductoDAO();
        $categoria = $modeloCat->selectAll("");

        // comunicarse con la vista
        require_once V_PRODUCTOS . 'productos.edit.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            $msj = 'Producto actualizado exitosamente.';
            $color = 'primary';

            $prod = new Producto();
    
            if (!empty($_POST['nombre']) && !empty($_POST['precio'])) {    
                $prod = new Producto();    
 
                $prod->setNombre(htmlentities($_POST['nombre']));
                $prod->setPrecio(htmlentities($_POST['precio']));    
                $exito = $this->model->update($prod);
                if(!$exito){
                    $msj = 'Error al actualizar el producto';
                    $color = 'danger';
                }
            } else {
                $msj = 'Debe llenar todos los campos';
                $color = 'danger';
            }
            if(!isset($_SESSION)){
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            header('location: index.php?c=producto&f=index'); 
        }
    }
    


    public function delete()
    {
        //leeer parametros
        $id = $_REQUEST['id'];
        //leeer parametros
        $prod = new Producto();
        $prod->setId(htmlentities($_REQUEST['id']));

        //comunicando con el modelo
        $exito = $this->model->delete($prod);

        $msj = 'Producto eliminado exitosamente.';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar al producto.";
            $color = "danger";
        }
        if (!isset($_SESSION)) {
            session_start();
        };
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?c=producto&f=index');
    }
}
