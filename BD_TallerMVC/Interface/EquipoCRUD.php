<?php

/**
 *
 * @author humbe
 */
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Model\Equipo.php';

interface EquipoCRUD {

    public function listas();

    public function lista(int $id);

    public function insertar(Equipo $equ);

    public function actualizar(Equipo $equ, $idU);

    public function eliminar(int $id);
}
