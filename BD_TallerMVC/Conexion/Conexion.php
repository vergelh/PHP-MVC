<?php

/**
 * Description of Conexion
 *
 * @author humbe
 */
class Conexion {

    protected $con;

    public function __construct() {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=prestamo", "root", "");
        } catch (PDOException $ex) {
            echo '<h1>Error de conexion' . $ex->getMessage() . '</h1>';
        }
    }

    public function __get($key) {
        return $this->$key;
    }

    public function __set($key, $value) {
        $this->$key = $value;
    }

}
