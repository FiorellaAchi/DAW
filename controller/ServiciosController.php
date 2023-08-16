<?php

require_once 'model/dao/ServiciosDAO.php';
require_once 'model/dto/Servicio.php';

class ServiciosController
{

  private $model;

  public function __construct()
  {
    $this->model = new ServiciosDAO();
  }

  public function index()
  {
    $titulo = "Lista de servicios";
    $resultados = $this->model->selectAll("");
    require_once V_SERVICIO. 'servicios.list.php';
  }

  public function search()
  {

    $parametro = (!empty($_POST["b"])) ? htmlentities($_POST["b"]) : "";
    $resultados = $this->model->selectAll($parametro);
    require_once V_SERVICIO . 'list.php';
  }

  public function busquedaAjax()
  {
    $titulo = "Lista de servicios";
    $parametro = (!empty($_GET["b"])) ? htmlentities($_GET["b"]) : "";
    $resultados =  $this->model->selectAll($parametro);
    echo json_encode($resultados);
  }

  public function view_new()
  {
    $titulo = "Nuevo servicio";
    $modeloServ = new ServiciosDAO();

    require_once V_SERVICIO . 'servicios.nuevo.php';
  }

  public function new()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $msj = 'Servicio guardado exitosamente';
      $color = 'primary';

      $serv = new Servicio();

      if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['medico']) && !empty($_POST['paciente']) && !empty($_POST['consulta'])) {

        $serv = new Servicio();
        $serv->setNombreServicio(htmlentities($_POST['nombre']));
        $serv->setDescripcion(htmlentities($_POST['descripcion']));
        $serv->setMedico_id(htmlentities($_POST['medico']));
        $serv->setPaciente_id(htmlentities($_POST['paciente']));
        $serv->setConsultamedica_id(htmlentities($_POST['consulta']));
        

        $exito = $this->model->insert($serv);

        if (!$exito) {
          $msj = "No se pudo realizar el guardado";
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

      header('Location:index.php?c=servicios&f=index');
    }
  }

  public function delete()
{
  if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO") {
    header('location: index.php');
}

   $id = $_REQUEST['id'];

   $serv = new Servicio();
   $serv -> setIdServicio(htmlentities($_REQUEST['id']));

   $valido = $this->model->delete($serv);
   $msj = 'Servicio Eliminado correctamente';
  $color = 'primary';

if(!$valido){
    $msj = "No se pudo eliminar correctamente.";
    $color = "danger";
}

if (!isset($_SESSION)) {
    session_start();
};

$_SESSION['mensaje'] = $msj;
$_SESSION['color'] = $color;

header('Location:index.php?c=servicios&f=index');


}

  

  public function view_edit()
  {
    $titulo = "Editar servicio";
    $id = $_REQUEST['id'];
    $serv = $this->model->selectOne($id);
    $modeloServ = new ServiciosDAO();

    require_once V_SERVICIO. 'servicios.edit.php';
  }

  public function edit()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $msj = 'Servicio actualizado exitosamente';
      $color = 'primary';
      $serv = new Servicio();

      if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['medico']) && !empty($_POST['paciente']) && !empty($_POST['consulta']) ) {

      $serv = new Servicio();
      $serv->setIdServicio(htmlentities($_POST['id']));
      $serv->setNombreServicio(htmlentities($_POST['nombre']));
      $serv->setDescripcion(htmlentities($_POST['descripcion']));
      $serv->setMedico_id(htmlentities($_POST['medico']));
      $serv->setPaciente_id(htmlentities($_POST['paciente']));
      $serv->setConsultamedica_id(htmlentities($_POST['consulta']));

      $exito = $this->model->update($serv);

        if (!$exito) {
          $msj = "No se pudo realizar la actualizacion";
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

      header('Location:index.php?c=Servicios&f=index');
    }
  }

  
}
