<?php
// Incluir la conexión a la base de datos
require "../config/Conexion.php";

class Venta {
    // Implementamos nuestro constructor
    public function __construct() {
    }

    // Método para insertar un registro de venta
    public function insertar($idcliente, $idusuario, $tipo_comprobante, $serie_comprobante, $num_comprobante, $fecha_hora, $impuesto, $total_venta, $idarticulo, $cantidad, $precio_venta, $descuento, $nacionalidad) {
        $sql = "INSERT INTO venta (idcliente, idusuario, tipo_comprobante, serie_comprobante, num_comprobante, fecha_hora, impuesto, total_venta, estado, nacionalidad) VALUES ('$idcliente', '$idusuario', '$tipo_comprobante', '$serie_comprobante', '$num_comprobante', '$fecha_hora', '$impuesto', '$total_venta', 'Aceptado', '$nacionalidad')";
        $idventanew = ejecutarConsulta_retornarID($sql);

        if (!is_array($idarticulo) || !is_array($cantidad) || !is_array($precio_venta) || !is_array($descuento)) {
            // Manejar el error de tipos de datos no esperados
            return false;
        }

        $num_elementos = 0;
        $sw = true;

        // Insertar detalles de la venta en la tabla detalle_venta
        while ($num_elementos < count($idarticulo)) {
            $sql_detalle = "INSERT INTO detalle_venta (idventa, idarticulo, cantidad, precio_venta, descuento) VALUES('$idventanew', '$idarticulo[$num_elementos]', '$cantidad[$num_elementos]', '$precio_venta[$num_elementos]', '$descuento[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos = $num_elementos + 1;
        }
        return $sw;
    }

    // Método para anular una venta
    public function anular($idventa) {
        $sql = "UPDATE venta SET estado='Anulado' WHERE idventa='$idventa'";
        return ejecutarConsulta($sql);
    }

    // Método para mostrar los datos de un registro a modificar
    public function mostrar($idventa) {
        $sql = "SELECT v.idventa, DATE(v.fecha_hora) as fecha, v.idcliente, p.nombre as cliente, u.idusuario, u.nombre as usuario, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, v.total_venta, v.impuesto, v.estado, v.nacionalidad FROM venta v INNER JOIN persona p ON v.idcliente = p.idpersona INNER JOIN usuario u ON v.idusuario = u.idusuario WHERE idventa='$idventa'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para listar los detalles de una venta
    public function listarDetalle($idventa) {
        $sql = "SELECT dv.idventa, dv.idarticulo, a.nombre, dv.cantidad, dv.precio_venta, dv.descuento, (dv.cantidad * dv.precio_venta - dv.descuento) as subtotal FROM detalle_venta dv INNER JOIN articulo a ON dv.idarticulo = a.idarticulo WHERE dv.idventa='$idventa'";
        return ejecutarConsulta($sql);
    }

    // Método para listar todas las ventas
    public function listar() {
        $sql = "SELECT v.idventa, DATE(v.fecha_hora) as fecha, v.idcliente, p.nombre as cliente, u.idusuario, u.nombre as usuario, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, v.total_venta, v.impuesto, v.estado, v.nacionalidad FROM venta v INNER JOIN persona p ON v.idcliente = p.idpersona INNER JOIN usuario u ON v.idusuario = u.idusuario ORDER BY v.idventa DESC";
        return ejecutarConsulta($sql);
    }

    // Método para obtener la cabecera de una venta
    public function ventacabecera($idventa) {
        $sql = "SELECT v.idventa, v.idcliente, p.nombre AS cliente, p.direccion, p.tipo_documento, p.num_documento, p.email, p.telefono, v.idusuario, u.nombre AS usuario, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, DATE(v.fecha_hora) AS fecha, v.impuesto, v.total_venta FROM venta v INNER JOIN persona p ON v.idcliente = p.idpersona INNER JOIN usuario u ON v.idusuario = u.idusuario WHERE v.idventa='$idventa'";
        return ejecutarConsulta($sql);
    }

    // Método para obtener los detalles de una venta
    public function ventadetalles($idventa) {
        $sql = "SELECT a.nombre AS articulo, a.codigo, d.cantidad, d.precio_venta, d.descuento, (d.cantidad * d.precio_venta - d.descuento) AS subtotal FROM detalle_venta d INNER JOIN articulo a ON d.idarticulo = a.idarticulo WHERE d.idventa='$idventa'";
        return ejecutarConsulta($sql);
    }
}
?>