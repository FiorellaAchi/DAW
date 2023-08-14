<?php 
//DOMENICA ORTIZ
    class Medico 
    {
        
        private $ID, $Cedula, $Nombres, $Apellidos, $Edad, $Especialidad, $Correo, $Numero_Telefono;

        function __construct()
        {
            
        }

        function getID() {
            return $this->ID;
        }

        function getCedula() {
            return $this->Cedula;
        }

        function getNombres() {
            return $this->Nombres;
        }

        function getApellidos() {
            return $this->Apellidos;
        }

        function getEdad() {
            return $this->Edad;
        }

        function getEspecialidad() {
            return $this->Especialidad;
        }

        function getCorreo() {
            return $this->Correo;
        }

        function getNumero_Telefono() {
            return $this->Numero_Telefono;
        }

        function setID($ID) {
            $this->ID = $ID;
        }

        function setCedula($Cedula) {
            $this->Cedula = $Cedula;
        }

        function setNombres($Nombres) {
            $this->Nombres = $Nombres;
        }

        function setApellidos($Apellidos) {
            $this->Apellidos = $Apellidos;
        }

        function setEdad($Edad) {
            $this->Edad = $Edad;
        }

        function setEspecialidad($Especialidad) {
            $this->Especialidad = $Especialidad;
        }

        function setCorreo($Correo) {
            $this->Correo = $Correo;
        }

        function setNumero_Telefono($Numero_Telefono) {
            $this->Numero_Telefono = $Numero_Telefono;
        }
    }
?>