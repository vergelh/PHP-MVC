<?php

/**
 * Description of Usuario
 *
 * @author humbe
 */
class Usuario {

    private $id;
    private $nombre;
    private $rol;

    public function __construct(){

    }

    // public function __construct($id, $nombre, $rol) {
    //     $this->id = $id;
    //     $this->nombre = $nombre;
    //     $this->rol = $rol;
    // }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

}
