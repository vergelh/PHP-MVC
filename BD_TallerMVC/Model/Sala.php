<?php

/**
 * Description of Sala
 *
 * @author humbe
 */
class Sala {

    private $id;
    private $nombre;
    private $cantidad;

    public function __construct(){
        
    }

    // public function __construct($id, $nombre, $cantidad) {
    //     $this->id = $id;
    //     $this->nombre = $nombre;
    //     $this->cantidad = $cantidad;
    // }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

}
