<?php
// Incluir la conexión a la base de datos
require "../config/Conexion.php";

class Articulo {
    // Implementamos nuestro constructor
    public function __construct() {
    }

    // Método para insertar un registro de artículo
    public function insertar($idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen) {
        $sql = "INSERT INTO articulo (idcategoria, codigo, nombre, stock, descripcion, imagen, condicion) VALUES ('$idcategoria', '$codigo', '$nombre', '$stock', '$descripcion', '$imagen', '1')";
        return ejecutarConsulta($sql);
    }

    // Método para editar un registro de artículo
    public function editar($idarticulo, $idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen) {
        $sql = "UPDATE articulo SET idcategoria='$idcategoria', codigo='$codigo', nombre='$nombre', stock='$stock', descripcion='$descripcion', imagen='$imagen' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    // Método para desactivar un artículo
    public function desactivar($idarticulo) {
        $sql = "UPDATE articulo SET condicion='0' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    // Método para activar un artículo
    public function activar($idarticulo) {
        $sql = "UPDATE articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    // Método para mostrar los datos de un artículo
    public function mostrar($idarticulo) {
        $sql = "SELECT * FROM articulo WHERE idarticulo='$idarticulo'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para listar todos los artículos con sus categorías
    public function listar() {
        $sql = "SELECT a.idarticulo, a.idcategoria, c.nombre as categoria, a.codigo, a.nombre, a.stock, a.descripcion, a.imagen, a.condicion FROM articulo a INNER JOIN Categoria c ON a.idcategoria=c.idcategoria";
        return ejecutarConsulta($sql);
    }

    // Método para listar solo los artículos activos
    public function listarActivos() {
        $sql = "SELECT a.idarticulo, a.idcategoria, c.nombre as categoria, a.codigo, a.nombre, a.stock, a.descripcion, a.imagen, a.condicion FROM articulo a INNER JOIN Categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
        return ejecutarConsulta($sql);
    }

    // Método para listar artículos activos con su último precio y stock
    public function listarActivosVenta() {
        $sql = "SELECT a.idarticulo, a.idcategoria, c.nombre as categoria, a.codigo, a.nombre, a.stock, (SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo ORDER BY iddetalle_ingreso DESC LIMIT 0,1) AS precio_venta, a.descripcion, a.imagen, a.condicion FROM articulo a INNER JOIN Categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
        return ejecutarConsulta($sql);
    }
}
?>
