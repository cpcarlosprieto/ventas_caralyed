<?php
// Incluir la conexión a la base de datos
require "../config/Conexion.php";

class Permiso {
    // Implementamos nuestro constructor
    public function __construct() {
    }

    // Método para listar registros de permisos
    public function listar() {
        $sql = "SELECT * FROM permiso";
        return ejecutarConsulta($sql);
    }
}
?>
