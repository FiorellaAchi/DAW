<?php 
require_once 'model/dto/Cliente.php';
require_once 'model/dao/ClienteDAO.php';

class ClienteController
{
    private $model;

    public function __construct()
    {
        $this->model = new ClienteDAO();
    }

    public function index()
    {
        $titulo = "Lista de Pacientes";
        $resultados = $this->model->selectAll("");
        require_once V_CLIENTE . 'cliente.list.php';
    }

    public function search()
    {
        $parametro = (!empty($_POST['b'])) ? htmlentities($_POST['b']) : "";
        $resultados = $this->model->selectAll($parametro);
        $titulo = "Buscar clientes";
        require_once V_CLIENTE . 'cliente.list.php';
    }

    public function view_new()
    {
        $titulo = "Nuevo cliente";
        require_once V_CLIENTE . 'cliente.new.php';
    }

    public function new()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $color = 'primary';

            $cli = new Cliente();

            if (!empty($_POST['nombre']) &&!empty($_POST['cedula']) && !empty($_POST['edad'])  && !empty($_POST['genero']) && !empty($_POST['correo']) && !empty($_POST['telefono']) && !empty($_POST['direccion'])) {
                $cli = new Cliente();
                $cli->setNombre($_POST['nombre']);
                $cli->setCorreo($_POST['correo']);
                $cli->setTelefono($_POST['telefono']);
                $cli->setDireccion($_POST['direccion']);
                $cli->setCedula($_POST['cedula']);
                $cli->setEdad($_POST['edad']);
                $cli->setGenero($_POST['genero']);

                $valido= $this->model->insert($cli);

                if (!$valido) {
                  $msj = "Cliente registrado correctamente";
                $color = "danger";
                }
              } else {
                $msj = "Debe llenar todos los campos";
                $color = "danger";
              }
        
              if (!isset($_SESSION)) {
                session_start();
              };
        
              $_SESSION['mensaje'] = $msj;
              $_SESSION['color'] = $color;
            header('Location: index.php?c=Cliente&a=index');
        }
    }

    public function view_edit()
    {
    $titulo = "Editar cliente";
    $cli = new Cliente();
    
    if (isset($_REQUEST['id'])) {
        $cli = $this->model->selectOne($_REQUEST['id']);
    }
    
    require_once V_CLIENTE . 'cliente.edit.php';
    }


    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $msj = 'Cliente actualizado correctamente';
            $color = 'primary';

            $cli = new Cliente();

            if (!empty($_POST['idPaciente']) && !empty($_POST['nombre']) &&!empty($_POST['cedula']) && !empty($_POST['edad'])  && !empty($_POST['genero']) && !empty($_POST['correo']) && !empty($_POST['telefono']) && !empty($_POST['direccion'])) {
                $cli = new Cliente();
                $cli->setIdCliente($_POST['idPaciente']);

                $cli->setNombre($_POST['nombre']);
                $cli->setCorreo($_POST['correo']);
                $cli->setTelefono($_POST['telefono']);
                $cli->setDireccion($_POST['direccion']);
                $cli->setCedula($_POST['cedula']);
                $cli->setEdad($_POST['edad']);
                $cli->setGenero($_POST['genero']);
                
                $valido= $this->model->update($cli);

                if (!$valido) {
                  $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
                }
              } else {
                $msj = "Debe llenar todos los campos";
                $color = "danger";
              }
        
              if (!isset($_SESSION)) {
                session_start();
              };
        
              $_SESSION['mensaje'] = $msj;
              $_SESSION['color'] = $color;
            header('Location: index.php?c=cliente&a=index');
            
        }
    }

    
    public function delete()
    {
        if (isset($_REQUEST['id'])) {
         
            $exito = $this->model->delete($_REQUEST['id']);
    
            if ($exito) {
                $msj = "Paciente eliminado correctamente";
                $color = "success";            
            } else {
                $msj = "No se pudo eliminar al paciente";
                $color = "danger";
            }
    
            if (!isset($_SESSION)) {
                session_start();
            }
    
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
    
            header('Location: index.php?c=Cliente&a=index');
        }
    }
    








    
}

?>