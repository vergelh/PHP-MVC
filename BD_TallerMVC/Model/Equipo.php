<?php

/**
 * Description of Equipos
 *
 * @author humbe
 */
class Equipo {

    private $id;
    private $descri;
    private $estado;
    private $sala;

    public function __construct(){
        
    }

    // public function __construct($id, $descri, $estado, $sala) {
    //     $this->id = $id;
    //     $this->descri = $descri;
    //     $this->estado = $estado;
    //     $this->sala = $sala;
    // }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescri() {
        return $this->descri;
    }

    public function setDescri($descri) {
        $this->descri = $descri;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getSala() {
        return $this->sala;
    }

    public function setSala($sala) {
        $this->sala = $sala;
    }

}
