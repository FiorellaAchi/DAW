<?php
require_once 'model/dao/ConsultaDAO.php';
require_once 'model/dto/Consulta.php';

class ConsultaController{
    private $model;

    public function __construct(){
        $this->model = new ConsultaDAO();
    }

    public function index(){
        $titulo = "Lista de consultas";
        $resultados = $this -> model -> selectAll("");
        require_once V_CONSULTA . 'consulta.medica.list.php';

    }

    public function search(){
        $parametro = (!empty($_POST['b']))?htmlentities($_POST['b']):"";
        $resultados = $this -> model -> selectAll($parametro);
        $titulo = "Buscar consultas";
        require_once V_CONSULTA . 'consulta.medica.list.php';
    }

    public function view_new(){
        $titulo = "Nueva consulta";
        require_once V_CONSULTA . 'consulta.medica.new.php';
    }

    public function new(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $msj = 'Consulta médica agendada correctamente';
            $color = 'primary';

            $cons = new Consulta();

            if(!empty($_POST['nombrePaciente']) && !empty($_POST['email']) && !empty($_POST['telefono']) && 
            !empty($_POST['especialidadMedica']) && !empty($_POST['fechaConsulta']) && !empty($_POST['horaConsulta'])){
                $cons = new Consulta();
                $cons -> setNombrePaciente($_POST['nombrePaciente']);
                $cons -> setEmail($_POST['email']);
                $cons -> setTelefono($_POST['telefono']);
                $cons -> setEspecialidadMedica($_POST['especialidadMedica']);
                $cons -> setFechaConsulta($_POST['fechaConsulta']);
                $cons -> setHoraConsulta($_POST['horaConsulta']);
                
                $valido = $this -> model -> insert($cons);

                if(!$valido){
                    $msj = 'Error al agendar la consulta';
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
            header('location: index.php?c=consulta&f=index'); 
        }           
    }

    public function view_edit(){
        $titulo = "Editar consulta";
        $id = $_REQUEST['id'];

        $con = $this -> model -> selectOne($id);

        require_once V_CONSULTA . 'consulta.medica.edit.php';
    }

    public function edit(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $msj = 'Consulta médica actualizada correctamente';
            $color = 'primary';

            $cons = new Consulta();

            if(!empty($_POST['nombrePaciente']) && !empty($_POST['email']) && !empty($_POST['telefono']) && 
            !empty($_POST['especialidadMedica']) && !empty($_POST['fechaConsulta']) && !empty($_POST['horaConsulta'])){
                $cons = new Consulta();
                
                $cons -> setIdConsulta($_POST['id']);
                $cons -> setNombrePaciente($_POST['nombrePaciente']);
                $cons -> setEmail($_POST['email']);
                $cons -> setTelefono($_POST['telefono']);
                $cons -> setEspecialidadMedica($_POST['especialidadMedica']);
                $cons -> setFechaConsulta($_POST['fechaConsulta']);
                $cons -> setHoraConsulta($_POST['horaConsulta']);
                
                $valido = $this -> model -> update($cons);

                if(!$valido){
                    $msj = 'Error al actualizar la consulta';
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
            header('location: index.php?c=consulta&f=index'); 
        }           
    }

    public function delete(){

        $id = $_REQUEST['id'];
        $cons = new Consulta();
        $cons -> setIdConsulta(htmlentities($id));

        $valido = $this -> model -> delete($id);
        $msj = "Consulta eliminada correctamente";

        if(!$valido){
            $msj = 'Error al eliminar la consulta';
            $color = 'danger';
        } else {
            $msj = 'Consulta eliminada correctamente';
            $color = 'primary';
        }
        if(!isset($_SESSION)){
            session_start();
        };
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        header('location: index.php?c=consulta&f=index');
    }


}

?>