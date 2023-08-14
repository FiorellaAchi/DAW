<?php  
//JOSE BONIFAZ CHACON
class Servicio
{
 private $idServicio, $nombreServicio, $descripcion, $medico_id, $paciente_id, $consultamedica_id;

    function __construct()
    {
    
    }

    function getIdServicio() {
        return $this->idServicio;
    }

    function getNombreServicio() {
        return $this->nombreServicio;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getMedico_id() {
        return $this->medico_id;
    }

    function getPaciente_id() {
        return $this->paciente_id;
    }

    function getConsultamedica_id() {
        return $this->consultamedica_id;
    }

    function setIdServicio($idServicio) {
        $this->idServicio = $idServicio;
    }

    function setNombreServicio($nombreServicio) {
        $this->nombreServicio = $nombreServicio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setMedico_id($medico_id) {
        $this->medico_id = $medico_id;
    }

    function setPaciente_id($paciente_id) {
        $this->paciente_id = $paciente_id;
    }

    function setConsultamedica_id($consultamedica_id) {
        $this->consultamedica_id = $consultamedica_id;
    }

    
}

?>