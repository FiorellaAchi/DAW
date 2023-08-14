<?php
class Consulta{
    private $idConsulta, $idPaciente, $idMedico, $nombrePaciente, $nombreMedico,$email, 
    $telefono, $especialidadMedica, $fechaConsulta, $horaConsulta, $consultaEstado;

    function __construct(){

    }

    function getIdConsulta(){
        return $this -> idConsulta;
    }

    function getIdPaciente(){
        return $this -> idPaciente;
    }

    function getIdMedico(){
        return $this -> idMedico;
    }

    function getNombrePaciente(){
        return $this -> nombrePaciente;
    }

    function getNombreMedico(){
        return $this -> nombreMedico;
    }

    function getEmail(){
        return $this -> email;
    }

    function getTelefono(){
        return $this -> telefono;
    }

    function getEspecialidadMedica(){
        return $this -> especialidadMedica;
    }

    function getFechaConsulta(){
        return $this -> fechaConsulta;
    }

    function getHoraConsulta(){
        return $this -> horaConsulta;
    }

    function getConsultaEstado(){
        return $this -> consultaEstado;
    }

    function setIdConsulta($idConsulta){
        $this->idConsulta = $idConsulta;
    }

    function setIdPaciente($idPaciente){
        $this->idPaciente = $idPaciente;
    }

    function setIdMedico($idMedico){
        $this->idMedico = $idMedico;
    }

    function setNombrePaciente($nombrePaciente){
        $this->nombrePaciente = $nombrePaciente;
    }

    function setNombreMedico($nombreMedico){
        $this->nombreMedico = $nombreMedico;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    function setEspecialidadMedica($especialidadMedica){
        $this->especialidadMedica = $especialidadMedica;
    }

    function setFechaConsulta($fechaConsulta){
        $this->fechaConsulta = $fechaConsulta;
    }

    function setHoraConsulta($horaConsulta){
        $this->horaConsulta = $horaConsulta;
    }

    function setConsultaEstado($consultaEstado){
        $this->consultaEstado = $consultaEstado;
    }


} 
?>