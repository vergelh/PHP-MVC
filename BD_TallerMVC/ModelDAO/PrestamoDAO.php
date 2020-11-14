<?php

/**
 * Description of PrestamoDAO
 *
 * @author humbe
 */
//require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Conexion\Conexion.php';
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Interface\PrestamoCRUD.php';

class PrestamoDAO implements PrestamoCRUD {

    protected $con;

    public function __construct() {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=prestamo", "root", "");
        } catch (PDOException $ex) {
            echo '<h1>Error de conexion' . $ex->getMessage() . '</h1>';
        }
    }

    public function listar() {
        $list = array();

        $sql = "SELECT * FROM prestamo";

        try {
            $rs = $this->con->query($sql);
//            foreach ($rs as $row) {
//                $pre = new Prestamo();
//                $pre->setId($row['pres_id']);
//                $pre->setUser($row['usua_id']);
//                $pre->setEquipo($row['equi_id']);
//                $pre->setFecha($row['pres_fecha']);
//                $list[] = $pre;
//            }
        } catch (Exception $ex) {
            echo '<h2>Error DAO' . $ex . '</h2>';
        }
        return $rs;
    }

    public function lista(int $id) {
        $sql = "SELECT * FROM prestamo WHERE pres_id=" . $id;
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo '<h2>Error DAO' . $ex . '</h2>';
        }
        return $rs;
    }

    public function insertar($pre) {
        $sql = "INSERT INTO prestamo (pres_id, usua_id, equi_id, pres_fecha) VALUES 
            ('{$pre['id']}', '{$pre['usua']}', '{$pre['equi']}', '{$pre['fecha']}')";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL INSERTAR: ' . $ex;
        }
    }

    public function actualizar($pre, $idU) {
        $sql = "UPDATE prestamo SET pres_id='{$pre['id']}', usua_id='{$pre['usua']}', equi_id='{$pre['equi']}', pres_fecha='{$pre['fecha']}' WHERE pres_id='{$idU}'";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ACTUALIZAR: ' . $ex;
        }
    }

    public function eliminar(int $id) {
        $sql = "DELETE FROM prestamo WHERE pres_id=" . $id;
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
    }

    public function Consultar($campo, $val) {
        $sql = "SELECT * FROM prestamo WHERE LOWER({$campo}) LIKE LOWER('%{$val}%')";
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
        return $rs;
    }

}
