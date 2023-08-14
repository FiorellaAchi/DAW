<?php

require_once 'model/dao/UsuarioDAO.php';
require_once 'model/dto/Usuario.php';

class UsuarioController
{

    private $model;

    public function __construct()
    { // constructor
        $this->model = new UsuarioDAO();
    }

    public function index(){
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO"){
            header('location: index.php');
        }
        $titulo = "Lista de usuarios";
        $resultados = $this -> model -> selectAll("");
        require_once V_USUARIOS . 'usuarios.list.php';
    }

    public function search(){
        $parametro = (!empty($_POST['b']))?htmlentities($_POST['b']):"";
        $resultados = $this -> model -> selectAll($parametro);
        $titulo = "Buscar usuarios";
        require_once V_USUARIOS . 'usuarios.list.php';
    } 

    public function login()
    {
        $titulo = "Iniciar Sesión";    
        require_once V_USUARIOS . 'usuarios.login.php';
  
    }

    public function validar()
    {

        if (isset($_POST['usuario']) && isset($_POST['password'])) {
            if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
                $username = $_POST['usuario'];
                $password = $_POST['password'];

                $validacion = $this->model->validarUsuario($username, $password);

                if ($validacion == true) {
                    //session_start();
                    $rol = strtoupper($validacion['nombreRol']);
                    $_SESSION['rol'] = $rol;

                    $_SESSION['nombre'] = $validacion['nombre'];
                    $_SESSION['apellido'] = $validacion['apellido'];

                    header('location: index.php');
                } else {
                    $titulo = "Iniciar Sesión";
                    $mensajeError = "El usuario y/o contraseña son incorrectos.";
                    require_once V_USUARIOS . 'usuarios.login.php';
                }
            } else {
                $titulo = "Iniciar Sesión";
                $mensajeError = "Campos Vacios";
                require_once V_USUARIOS . 'usuarios.login.php';
            }
        }
    }

    public function cerrarSesion()
    {
        $titulo = "Iniciar Sesión";
        //session_start();
        if (isset($_SESSION['rol'])) {
            session_unset();
            session_destroy();

            require_once V_USUARIOS . 'usuarios.login.php';
        } else {
            echo "La sesión ha caducada.";
        }
    }

    public function view_new(){
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO"){
            header('location: index.php');
        }

        $titulo = "Registar nuevo usuario";

        require_once V_USUARIOS .'usuarios.new.php';

    }

   
    public function new()
    {
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO") {
            header('location: index.php');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

            $msj = 'Usuario guardado exitosamente.';
            $color = 'primary';

            if (!empty($_POST['nombre']) && !empty($_POST['apellido']) 
            && !empty($_POST['nombreUsuario']) && !empty($_POST['contra']) && !empty($_POST['rol'])) {


                $usuario = new Usuario();
                // lectura de parametros
                $usuario -> setNombre(htmlentities($_POST['nombre']));
                $usuario -> setApellido(htmlentities($_POST['apellido']));
                $usuario -> setNombreUsuario(htmlentities($_POST['nombreUsuario']));
                $usuario -> setPassword(htmlentities($_POST['contra']));
                $usuario -> setRol(htmlentities($_POST['rol']));

                $validar = new UsuarioDAO();
                $validacion = $validar->existeUsuario($usuario->getNombreUsuario());
                $exito = $this->model->insert($usuario);
                
                if (!$validacion) {
                    

                    if (!$exito) {
                        $msj = "No se pudo guardar correctamente.";
                        $color = "danger";
                    }
                } else {
                    $msj = "Ya existe este usuario.";
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

            header('Location:index.php?c=usuario&f=index');
        }
    }

    public function view_edit(){
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO") {
            header('location: index.php');
        }

        $titulo = "Editar usuario";
        $id = $_REQUEST['id'];

        $user = $this->model->selectOne($id);

        require_once V_USUARIOS .'usuarios.edit.php';
    }
    
    public function edit(){
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO") {
            header('location: index.php');
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $msj = 'Usuario actualizado correctamente';
            $color = 'primary';

            if(!empty($_POST['nombre']) && !empty($_POST['apellido']) 
            && !empty($_POST['nombreUsuario']) && !empty($_POST['contra']) && !empty($_POST['rol'])){
                
                $usuario = new Usuario();

                $usuario -> setId(htmlentities($_POST['id']));
                $usuario -> setNombre(htmlentities($_POST['nombre']));
                $usuario -> setApellido(htmlentities($_POST['apellido']));
                $usuario -> setNombreUsuario(htmlentities($_POST['nombreUsuario']));
                $usuario -> setPassword(htmlentities($_POST['contra']));
                $usuario -> setRol(htmlentities($_POST['rol']));

                $valido = $this->model->update($usuario);

                if(!$valido){
                    $msj = "No se pudo actualizar correctamente.";
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
            header('Location:index.php?c=usuario&f=index');            
        }
    }

    public function delete(){
        if(!isset($_SESSION['rol']) || $_SESSION['rol'] == "CLIENTE" || $_SESSION['rol'] == "MEDICO") {
            header('location: index.php');
        }

        $id = $_REQUEST['id'];

        $usuario = new Usuario();
        $usuario -> setId(htmlentities($_REQUEST['id']));

        $valido = $this->model->delete($usuario);
        $msj = 'Usuario eliminado correctamente';
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

        header('Location:index.php?c=usuario&f=index');
        
    }

}
