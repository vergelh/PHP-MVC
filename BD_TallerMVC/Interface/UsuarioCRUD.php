<?php

/**
 *
 * @author humbe
 */
require 'C:\xampp\htdocs\BaseDatos\BD_TallerMVC\Model\Usuario.php';

interface UsuarioCRUD {

    public function listas();

    public function lista(int $id);

    public function insertar(Usuario $usu);

    public function actualizar(Usuario $usu, $id);

    public function eliminar(int $id);
}
