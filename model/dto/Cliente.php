<?php 
class Cliente
{
    private $idCliente, $nombre, $cedula, $edad, $genero, $correo, $direccion, $telefono;
    function __construct()
    {
        
    }
    function getIdCliente(){
        return $this->idCliente;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getCedula(){
        return $this->cedula;
    }
    function getEdad(){
        return $this->edad;
    }
    function getGenero(){
        return $this->genero;
    }
    function getCorreo(){
        return $this->correo;
    }
    function getDireccion(){
        return $this->direccion;
    }
    function getTelefono(){
        return $this->telefono;
    }
    function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setCedula($cedula){
        $this->cedula = $cedula;
    }
    function setEdad($edad){
        $this->edad = $edad;
    }
    function setGenero($genero){
        $this->genero = $genero;
    }
    function setCorreo($correo){
        $this->correo = $correo;
    }
    function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    function setTelefono($telefono){
        $this->telefono = $telefono;
    }
}
?>