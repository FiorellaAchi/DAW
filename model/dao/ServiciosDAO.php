<?php
// autor: JOSE BONIFAZ CHACON
require_once 'config/Conexion.php';

class ServiciosDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro)
    {
        $sql = "SELECT s.idServicio, s.nombreServicio, s.descripcion, m.Nombres AS nombreMedico, p.nombre AS nombrePaciente, c.especialidadMedica AS nombreConsulta
    FROM servicios s
    INNER JOIN medicos m ON s.medico_id = m.ID
    INNER JOIN pacientes p ON s.paciente_id = p.idPaciente
    INNER JOIN consulta_medica c ON s.consultamedica_id = c.idConsulta
    WHERE (s.nombreServicio LIKE :b1 OR s.descripcion LIKE :b2 OR s.medico_id LIKE :b3 OR s.paciente_id LIKE :b4 OR s.consultamedica_id LIKE :b5)";

        $stmt = $this->con->prepare($sql);
        $conlike = '%' . $parametro . '%';
        $data = array('b1' => $conlike, 'b2' => $conlike, 'b3' => $conlike, 'b4' => $conlike, 'b5' => $conlike);
        $stmt->execute($data);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }


    public function selectOne($id)
    {
        $sql = "SELECT * FROM servicios where idServicio=:id";
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        $stmt->execute($data);
        $servicio = $stmt->fetch(PDO::FETCH_ASSOC);

        return $servicio;
    }



    public function insert($serv)
    {
        try {
            $sql = "INSERT INTO servicios (nombreServicio, descripcion, medico_id, paciente_id, consultamedica_id) VALUES 
            (:nom, :descr, :med, :pac, :cons)";
    
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' => $serv->getNombreServicio(),
                'descr' => $serv->getDescripcion(),
                'med' => $serv->getMedico_id(),
                'pac' => $serv->getPaciente_id(),
                'cons' => $serv->getConsultamedica_id()
            ];
            $sentencia->execute($data);
            if ($sentencia->rowCount() <= 0) {
                throw new Exception("Error: No se pudo insertar el registro.");
            } else {
                return true;
            }
        } catch (Exception $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }
    

    public function update($servicio)
    {

        try {
            $sql = "UPDATE `servicios` SET `nombreServicio`=:nom, `descripcion`=:descr, `medico_id`=:med, " .
            "`paciente_id`=:pac, `consultamedica_id`=:cons WHERE idServicio =:id";
            $sentencia = $this->con->prepare($sql);
            $data = [
                'nom' => $servicio->getNombreServicio(),
                'descr' => $servicio->getDescripcion(),
                'med' => $servicio->getMedico_id(),
                'pac' => $servicio->getPaciente_id(),
                'cons' => $servicio->getConsultamedica_id(),
                'id' => $servicio->getIdServicio()
            ];
            $sentencia->execute($data);
            if ($sentencia->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM servicios WHERE idServicio = :id";
            $query = $this->con->prepare($sql);
            $data = [
                'id' => $id->getIdServicio()
            ];
            $query->execute($data);
            if ($query->rowCount() <= 0) {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
        return true;

    }

}