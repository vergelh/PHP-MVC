<?php

/**
 * Description of Prestamo
 *
 * @author humbe
 */
class Prestamo {

    private $id;
    private $user;
    private $equipo;
    private $fecha;

    public function __construct(){

    }

    // public function __construct($id, $user, $equipo, $fecha) {
    //     $this->id = $id;
    //     $this->user = $user;
    //     $this->equipo = $equipo;
    //     $this->fecha = $fecha;
    // }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getEquipo() {
        return $this->equipo;
    }

    public function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
