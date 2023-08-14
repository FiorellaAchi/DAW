<?php 
require_once 'model/dao/ServicioDAO.php';
require_once 'model/dto/Servicio.php';

class ServicioController
{
    private $model;

    public function __construct()
    {
        $this->model = new ServicioDAO();
    }

    public function index()
    {
        if(!isset($_SESSION['rol'])  || $_SESSION['rol'] == "MEDICO"){
            header('location: index.php');
        }
        $titulo = "Lista de servicios";
        $resultados = $this -> model -> selectAll("");
        require_once V_SERVICIO . 'servicios.list.php';

    }

    public function insert()
    {
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO"){
            header('location: index.php');
        }
        $titulo = "Insertar servicio";
        require_once V_SERVICIO . 'servicios.insert.php';
    }

    public function edit()
    {
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO"){
            header('location: index.php');
        }
        $titulo = "Editar servicio";
        $id = $_GET['id'];
        $servicio = $this -> model -> selectOne($id);
        require_once V_SERVICIO . 'servicios.edit.php';
    }

    public function delete()
    {
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO"){
            header('location: index.php');
        }
        $id = $_GET['id'];
        $this -> model -> delete($id);
        header('location: index.php?c=servicio&a=index');
    }
}
?>