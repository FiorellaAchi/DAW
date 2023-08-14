<?php
//LUIS BEDOYA JAIME
class Usuario{
    private $id, $nombre, $apellido, $nombreUsuario,$password, $nombreRol;

    function __construct() {

    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getNombreUsuario(){
        return $this->nombreUsuario;
    }

    function getPassword() {
        return $this->password;
    }


    function getRol() {
        return $this->nombreRol;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->nombreRol = $rol;
    }

}
