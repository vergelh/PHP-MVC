<?php

/**
 * Description of EquipoDAO
 *
 * @author humbe
 */
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Interface\EquipoCRUD.php';

class EquipoDAO implements EquipoCRUD {

    protected $con;

    public function __construct() {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=prestamo", "root", "");
        } catch (PDOException $ex) {
            echo '<h1>Error de conexion' . $ex->getMessage() . '</h1>';
        }
    }

    public function listas() {

        // $list = array();

        $sql = "SELECT * FROM equipos";
        try {
            $rs = $this->con->query($sql);

            // foreach ($rs as $row) {
            //     $equ = new Equipo();
            //     $equ->setId($row['equi_id']);
            //     $equ->setDescri($row['equi_descri']);
            //     $equ->setEstado($row['equi_estado']);
            //     $equ->setSala($row['sala_id']);
            //     $list[] = $equ;
            // }
        } catch (Exception $ex) {
            echo '<h2>Error' . $ex . '</h2>';
        }
        return $rs;
    }

    public function lista(int $id) {
        $sql = "SELECT * FROM equipos WHERE equi_id=" . $id;
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo '<h2>Error DAO' . $ex . '</h2>';
        }
        return $rs;
    }

    public function insertar($equ) {
        $sql = "INSERT INTO equipos (equi_id, equi_descri, equi_estado, sala_id) VALUES"
                . "('{$equ['id']}', '{$equ['descri']}', '{$equ['estado']}', '{$equ['sala']}')";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL INSERTAR: ' . $ex;
        }
    }

    public function actualizar($equ, $idU) {
        $sql = "UPDATE equipos SET equi_id='{$equ['id']}', equi_descri='{$equ['descri']}', equi_estado='{$equ['estado']}', sala_id='{$equ['sala']}' WHERE equi_id='{$idU}'";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ACTUALIZAR: ' . $ex;
        }
    }

    public function eliminar(int $id) {

        $sql = "DELETE FROM equipos WHERE equi_id=" . $id;
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
    }
    
    public function  Consultar($campo, $val){
        $sql = "SELECT * FROM equipos WHERE LOWER({$campo}) LIKE LOWER('%{$val}%')";
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
        return $rs;
    }

}
