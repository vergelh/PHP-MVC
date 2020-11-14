<?php

/**
 *
 * @author humbe
 */
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Model\Prestamo.php';

interface PrestamoCRUD {

    public function listar();

    public function lista(int $id);

    public function insertar(Prestamo $pre);

    public function actualizar(Prestamo $pre, $idU);

    public function eliminar(int $id);
}
