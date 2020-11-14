<?php

/**
 *
 * @author humbe
 */
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Model\Sala.php';

interface SalaCRUD {

    public function listas();

    public function lista(int $id);

    public function insertar(Sala $sal);

    public function actualizar(Sala $sal, $idU);

    public function eliminar(int $sal);
}
