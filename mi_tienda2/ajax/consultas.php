<?php
// Incluimos el modelo necesario
require_once "../modelos/Consultas.php";

// Creamos una instancia de la clase Consultas
$consulta = new Consultas();

// Verificamos la operación solicitada
switch ($_GET["op"]) {
    // Caso para obtener compras en un rango de fechas
    case 'comprasfecha':
        // Obtenemos las fechas de inicio y fin de la solicitud
        $fecha_inicio = $_REQUEST["fecha_inicio"];
        $fecha_fin = $_REQUEST["fecha_fin"];

        // Obtenemos los resultados de la consulta
        $rspta = $consulta->comprasfecha($fecha_inicio, $fecha_fin);
        $data = Array();

        // Recorremos los resultados y los almacenamos en un array
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->fecha,
                "1" => $reg->usuario,
                "2" => $reg->proveedor,
                "3" => $reg->tipo_comprobante,
                "4" => $reg->serie_comprobante . ' ' . $reg->num_comprobante,
                "5" => $reg->total_compra,
                "6" => $reg->impuesto,
                "7" => ($reg->estado == 'Aceptado') ? '<span class="label bg-green">Aceptado</span>' : '<span class="label bg-red">Anulado</span>'
            );
        }

        // Creamos el array de resultados para DataTables
        $results = array(
            "sEcho" => 1, // Información para DataTables
            "iTotalRecords" => count($data), // Total de registros
            "iTotalDisplayRecords" => count($data), // Total de registros a visualizar
            "aaData" => $data
        );

        // Convertimos los resultados a formato JSON y los mostramos
        echo json_encode($results);
        break;

    // Caso para obtener ventas en un rango de fechas para un cliente específico
    case 'ventasfechacliente':
        // Obtenemos las fechas de inicio y fin, así como el id del cliente
        $fecha_inicio = $_REQUEST["fecha_inicio"];
        $fecha_fin = $_REQUEST["fecha_fin"];
        $idcliente = $_REQUEST["idcliente"];

        // Obtenemos los resultados de la consulta
        $rspta = $consulta->ventasfechacliente($fecha_inicio, $fecha_fin, $idcliente);
        $data = Array();

        // Recorremos los resultados y los almacenamos en un array
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->fecha,
                "1" => $reg->usuario,
                "2" => $reg->cliente,
                "3" => $reg->tipo_comprobante,
                "4" => $reg->serie_comprobante . ' ' . $reg->num_comprobante,
                "5" => $reg->total_venta,
                "6" => $reg->impuesto,
                "7" => ($reg->estado == 'Aceptado') ? '<span class="label bg-green">Aceptado</span>' : '<span class="label bg-red">Anulado</span>'
            );
        }

        // Creamos el array de resultados para DataTables
        $results = array(
            "sEcho" => 1, // Información para DataTables
            "iTotalRecords" => count($data), // Total de registros
            "iTotalDisplayRecords" => count($data), // Total de registros a visualizar
            "aaData" => $data
        );

        // Convertimos los resultados a formato JSON y los mostramos
        echo json_encode($results);
        break;
}
?>
