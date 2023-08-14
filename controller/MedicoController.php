<?php 
  require_once 'model/dao/MedicoDAO.php';
  require_once 'model/dto/Medico.php';

  class MedicoController
  {
    private $model;

    public function __construct()
    {
      $this->model = new MedicoDAO();
    }

    public function index()
    {
      $titulo = "Lista de medicos";
      $resultados = $this->model->selectAll("");
      require_once V_MEDICO . 'medico.list.php';
    }

    public function search()
    {
      $parametro = (!empty($_POST['b'])) ? htmlentities($_POST['b']) : "";
      $resultados = $this->model->selectAll($parametro);
      $titulo = "Buscar medicos";
      require_once V_MEDICO . 'medico.list.php';
    }

    public function view_new()
    {
      $titulo = "Nuevo medico";
      require_once V_MEDICO . 'medico.new.php';
    }

    public function new()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $msj = 'Medico registrado correctamente';
            $color = 'primary';
            $med = new Medico();
            if (!empty($_POST['cedula']) && !empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['edad']) && !empty($_POST['especialidad']) && !empty($_POST['correo']) && !empty($_POST['telefono'])) {
              $med->setCedula($_POST['cedula']);
              $med->setNombres($_POST['nombres']);
              $med->setApellidos($_POST['apellidos']);
              $med->setEdad($_POST['edad']);
              $med->setEspecialidad($_POST['especialidad']);
              $med->setCorreo($_POST['correo']);
              $med->setNumero_Telefono($_POST['telefono']);

            $exito = $this->model->insert($med);
            if(!$exito){
                $msj = 'Error al registrar el medico';
                $color = 'danger';
            }else{
                $msj = 'Medico registrado correctamente';
                $color = 'primary';
            }
            }else{
              $msj = "Los campos no deben estar vacios";
              $color = "danger";
            }

            if(!isset($_SESSION)){
                session_start();
            };

            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            header('Location: index.php?c=medico&f=index');
        }
        
    }

    public function view_edit()
    {
      $titulo = "Actualizar medico";
      $med = new Medico();
      $id = $_REQUEST['id'];
      $med = $this->model->selectOne($id);
      require_once V_MEDICO . 'medico.edit.php';
      
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $msj = 'Medico actualizado correctamente';
            $color = 'primary';
            $med = new Medico();
    
            $med->setID($_POST['id']);
            $med->setCedula($_POST['Cedula']);
            $med->setNombres($_POST['Nombres']);
            $med->setApellidos($_POST['Apellidos']);
            $med->setEdad($_POST['Edad']);
            $med->setEspecialidad($_POST['Especialidad']);
            $med->setCorreo($_POST['Correo']);
            $med->setNumero_Telefono($_POST['Numero_Telefono']);
    
            $exito = $this->model->update($med);
    
            if (!$exito) {
                $msj = "No se pudo realizar la actualización";
                $color = "danger";
            }
    
            if (!isset($_SESSION)) {
                session_start();
            }
    
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
    
            header('Location: index.php?c=medico&f=index');
        }
    }
    

    public function delete()
    {
        $id=$_REQUEST['id'];
        $med = new Medico();
        $med ->setID(htmlentities($id));
        $valido = $this -> model -> delete($med);
        $msj = 'Medico eliminado correctamente';
        if(!$valido){
            $msj = 'Error al eliminar el medico';
            $color = 'danger';
    }else{
            $msj = 'Medico eliminado correctamente';
            $color = 'primary';
        }

        if(!isset($_SESSION)){
            session_start();
        };

        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        header('Location: index.php?c=medico&f=index');$_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
    }

  }
?>