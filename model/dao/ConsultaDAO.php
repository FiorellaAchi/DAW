<?php
require_once 'config/Conexion.php';
require_once 'model/dto/Consulta.php';
//LUIS BEDOYA JAIME
class ConsultaDAO{
    private $con;

    public function __construct(){
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        $sql = "SELECT * FROM consulta_medica where nombrePaciente like :b1";
        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike);
        $stmt -> execute($data);
        $resultados = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public function selectOne($id){
        $sql = "SELECT * FROM consulta_medica where idConsulta=:id";
        $stmt = $this -> con -> prepare($sql);
        $data = ['id' => $id];
        $stmt -> execute($data);
        $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $consulta;
    }

    public function insert($cons){
        try{
            $sql = "INSERT INTO consulta_medica (nombrePaciente, email, telefono, especialidadMedica, fechaConsulta, horaConsulta) 
            VALUES (:nombrePaciente, :email, :telefono, :especialidadMedica, :fechaConsulta, :horaConsulta)";
            $query = $this->con->prepare($sql);
            $data = [
                'nombrePaciente' => $cons->getNombrePaciente(),
                'email' => $cons->getEmail(),
                'telefono' => $cons->getTelefono(),
                'especialidadMedica' => $cons->getEspecialidadMedica(),
                'fechaConsulta' => $cons->getFechaConsulta(),
                'horaConsulta' => $cons->getHoraConsulta()
            ];
            $query -> execute($data);
            if($query -> rowCount() >= 0){
                return false;
            }
        } catch(Exception $ex){
            echo $ex -> getMessage();
            return false;
        }
        return true;
    }

    public function update($consulta){
        try{
            $sql = "UPDATE consulta_medica SET nombrePaciente=:nombrePaciente, email=:email, telefono=:telefono, especialidadMedica=:especialidadMedica, 
            fechaConsulta=:fechaConsulta, horaConsulta=:horaConsulta WHERE idConsulta=:idConsulta";
            $query = $this->con->prepare($sql); 
            $data = [
                'idConsulta' => $consulta->getIdConsulta(),
                'nombrePaciente' => $consulta->getNombrePaciente(),
                'email' => $consulta->getEmail(),
                'telefono' => $consulta->getTelefono(),
                'especialidadMedica' => $consulta->getEspecialidadMedica(),
                'fechaConsulta' => $consulta->getFechaConsulta(),
                'horaConsulta' => $consulta->getHoraConsulta()
            ];
            $query -> execute($data);
            if($query -> rowCount() >= 0){
                return false;
            }
        } catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function delete($id){
        try{
            $sql = "DELETE FROM consulta_medica WHERE idConsulta=:idConsulta";
            $query = $this->con->prepare($sql);
            $data = ['idConsulta' => $id];
            $query -> execute($data);
            if($query -> rowCount() >= 0){
                return false;
            }
        } catch(Exception $ex){
            echo $ex -> getMessage();
            return false;
        }
        return true;
    }
}
?>