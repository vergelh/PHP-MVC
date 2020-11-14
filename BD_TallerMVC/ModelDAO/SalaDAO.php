<?php

/**
 * Description of SalaDAO
 *
 * @author humbe
 */
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Interface\SalaCRUD.php';

class SalaDAO implements SalaCRUD {

    protected $con;

    public function __construct() {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=prestamo", "root", "");
        } catch (PDOException $ex) {
            echo '<h1>Error de conexion' . $ex->getMessage() . '</h1>';
        }
    }

    public function listas() {
        $sql = "SELECT * FROM sala";
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo '<h2>Error DAO' . $ex . '</h2>';
        }
        return $rs;
    }

    public function lista(int $id) {
        $sql = "SELECT * FROM sala WHERE sala_id=" . $id;
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo '<h2>Error DAO' . $ex . '</h2>';
        }
        return $rs;
    }

    public function insertar($sal) {
        $sql = "INSERT INTO sala (sala_id, sala_nombre, sala_cantidad) VALUES"
                . "('{$sal['id']}', '{$sal['nombre']}', '{$sal['cantidad']}')";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL INSERTAR: ' . $ex;
        }
    }

    public function actualizar($sal, $idU) {
        $sql = "UPDATE sala SET sala_id='{$sal['id']}', sala_nombre='{$sal['nombre']}', sala_cantidad='{$sal['cantidad']}' WHERE sala_id='{$idU}'";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ACTUALIZAR: ' . $ex;
        }
    }

    public function eliminar(int $id) {
        $sql = "DELETE FROM sala WHERE sala_id=" . $id;
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
    }
    
    public function  Consultar($campo, $val){
        $sql = "SELECT * FROM sala WHERE LOWER({$campo}) LIKE LOWER('%{$val}%')";
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
        return $rs;
    }

}
