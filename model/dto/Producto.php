<?php
//FIORELLA ACHI
class Producto {
    private $id, $nombre, $precio;

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }    

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}
