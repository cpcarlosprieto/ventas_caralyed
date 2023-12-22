<?php
// Incluir la conexión a la base de datos
require "../config/Conexion.php";

class Categoria {
    // Implementamos nuestro constructor
    public function __construct() {
    }

    // Método para insertar un registro de categoría
    public function insertar($nombre, $descripcion) {
        $sql = "INSERT INTO categoria (nombre, descripcion, condicion) VALUES ('$nombre', '$descripcion', '1')";
        return ejecutarConsulta($sql);
    }

    // Método para editar un registro de categoría
    public function editar($idcategoria, $nombre, $descripcion) {
        $sql = "UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

    // Método para desactivar una categoría
    public function desactivar($idcategoria) {
        $sql = "UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

    // Método para activar una categoría
    public function activar($idcategoria) {
        $sql = "UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }

    // Método para mostrar los datos de una categoría
    public function mostrar($idcategoria) {
        $sql = "SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para listar todas las categorías
    public function listar() {
        $sql = "SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }

    // Método para listar y mostrar en un select solo las categorías activas
    public function select() {
        $sql = "SELECT * FROM categoria WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
}
?>
