<?php

/**
 * Description of UsuarioDAO
 *
 * @author humbe
 */
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Interface\UsuarioCRUD.php';

class UsuarioDAO implements UsuarioCRUD {

    protected $con;

    public function __construct() {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=prestamo", "root", "");
        } catch (PDOException $ex) {
            echo '<h1>Error de conexion' . $ex->getMessage() . '</h1>';
        }
    }

    public function listas() {
        $sql = "SELECT * FROM usuario";
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo '<h2>Error DAO' . $ex . '</h2>';
        }

        return $rs;
    }

    public function lista(int $id) {
        $sql = "SELECT * FROM usuario WHERE usua_id=" . $id;
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo '<h2>Error DAO' . $ex . '</h2>';
        }

        return $rs;
    }

    public function insertar($usu) {
        $sql = "INSERT INTO usuario (usua_id, usua_nombres, usua_rol, usua_img) VALUES"
                . "('{$usu['id']}', '{$usu['name']}', '{$usu['rol']}', '{$usu['img']}')";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL INSERTAR: ' . $ex;
        }
    }

    public function actualizar($usu, $idU) {
        $sql = "UPDATE usuario SET usua_id='{$usu['id']}', usua_nombres='{$usu['name']}', usua_rol='{$usu['rol']}', usua_img='{$usu['img']}' WHERE usua_id='{$idU}'";
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ACTUALIZAR: ' . $ex;
        }
    }

    public function eliminar(int $id) {
        $sql = "DELETE FROM usuario WHERE usua_id=" . $id;
        try {
            $this->con->prepare($sql)->execute();
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
    }
    
    public function  Consultar($campo, $val){
        $sql = "SELECT * FROM usuario WHERE LOWER({$campo}) LIKE LOWER('%{$val}%')";
        try {
            $rs = $this->con->query($sql);
        } catch (Exception $ex) {
            echo 'ERROR AL ELIMINAR: ' . $ex;
        }
        return $rs;
    }

}
