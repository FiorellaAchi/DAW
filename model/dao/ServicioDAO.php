<?php

require_once 'config/config.php';
require_once 'model/dao/ServicioDAO.php';
require_once 'model/dto/Servicio.php';

class ServicioDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro)
    {
        $sql = "SELECT * FROM servicios where 
        (nombreServicio like :b1 or descripcion like :b2 or medico_id like :b3 or paciente_id like :b4 or consultamedica_id like :b5)";
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

    public function insert($servicio)
    {
        try {

            $sql = "INSERT INTO servicios (nombreServicio, descripcion, medico_id, paciente_id, consultamedica_id) VALUES (:nom, :des, :med, :pac, :con)";
            $query = $this->con->prepare($sql);
            $data = [
                'nom' => $servicio->getNombreServicio(),
                'des' => $servicio->getDescripcion(),
                'med' => $servicio->getMedico_id(),
                'pac' => $servicio->getPaciente_id(),
                'con' => $servicio->getConsultamedica_id()
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


 


    public function update($servicio)
    {
        try {
            $sql = "UPDATE servicios SET nombreServicio=:nom, descripcion=:des, medico_id=:med, paciente_id=:pac, consultamedica_id=:con WHERE idServicio=:id";
            $query = $this->con->prepare($sql);
            $data = [
                'id' => $servicio->getIdServicio(),
                'nom' => $servicio->getNombreServicio(),
                'des' => $servicio->getDescripcion(),
                'med' => $servicio->getMedico_id(),
                'pac' => $servicio->getPaciente_id(),
                'con' => $servicio->getConsultamedica_id()
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

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM servicios WHERE idServicio=:id";
            $query = $this->con->prepare($sql);
            $data = [
                'id' => $id
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
