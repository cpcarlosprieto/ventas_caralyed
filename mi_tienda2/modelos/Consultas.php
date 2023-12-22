<?php
// Incluir la conexión a la base de datos
require "../config/Conexion.php";

class Consultas {
    // Implementamos nuestro constructor
    public function __construct() {
    }

    // Método para obtener las compras en un rango de fechas
    public function comprasfecha($fecha_inicio, $fecha_fin) {
        $sql = "SELECT DATE(i.fecha_hora) as fecha, u.nombre as usuario, p.nombre as proveedor, i.tipo_comprobante, i.serie_comprobante, i.num_comprobante, i.total_compra, i.impuesto, i.estado, i.nacionalidad FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE DATE(i.fecha_hora)>='$fecha_inicio' AND DATE(i.fecha_hora)<='$fecha_fin'";
        return ejecutarConsulta($sql);
    }

    // Método para obtener las ventas de un cliente en un rango de fechas
    public function ventasfechacliente($fecha_inicio, $fecha_fin, $idcliente) {
        $sql = "SELECT DATE(v.fecha_hora) as fecha, u.nombre as usuario, p.nombre as cliente, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, v.total_venta, v.impuesto, v.estado, v.nacionalidad FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.idcliente='$idcliente'";
        return ejecutarConsulta($sql);
    }

    // Método para obtener el total de compras realizadas hoy
    public function totalcomprahoy() {
        $sql = "SELECT IFNULL(SUM(total_compra),0) as total_compra FROM ingreso WHERE DATE(fecha_hora)=curdate()";
        return ejecutarConsulta($sql);
    }

    // Método para obtener el total de ventas realizadas hoy
    public function totalventahoy() {
        $sql = "SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
        return ejecutarConsulta($sql);
    }

    // Método para obtener las compras de los últimos 10 días
    public function comprasultimos_10dias() {
        $sql = "SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) AS fecha, SUM(total_compra) AS total FROM ingreso GROUP BY fecha_hora ORDER BY fecha_hora DESC LIMIT 0,10";
        return ejecutarConsulta($sql);
    }

    // Método para obtener las ventas de los últimos 12 meses
    public function ventasultimos_12meses() {
        $sql = "SELECT DATE_FORMAT(fecha_hora,'%M') AS fecha, SUM(total_venta) AS total FROM venta GROUP BY MONTH(fecha_hora) ORDER BY fecha_hora DESC LIMIT 0,12";
        return ejecutarConsulta($sql);
    }
}
?>