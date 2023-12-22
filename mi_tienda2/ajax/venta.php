<?php
require_once "../modelos/Venta.php";

// Iniciar la sesión si no está iniciada
if (strlen(session_id()) < 1) {
    session_start();
}

$venta = new Venta();

// Obtener valores de $_POST 
$idventa = isset($_POST["idventa"]) ? limpiarCadena($_POST["idventa"]) : "";
$idcliente = isset($_POST["idcliente"]) ? limpiarCadena($_POST["idcliente"]) : "";
$idusuario = isset($_SESSION["idusuario"]) ? $_SESSION["idusuario"] : null;
$tipo_comprobante = isset($_POST["tipo_comprobante"]) ? limpiarCadena($_POST["tipo_comprobante"]) : "";
$serie_comprobante = isset($_POST["serie_comprobante"]) ? limpiarCadena($_POST["serie_comprobante"]) : "";
$num_comprobante = isset($_POST["num_comprobante"]) ? limpiarCadena($_POST["num_comprobante"]) : "";
$fecha_hora = isset($_POST["fecha_hora"]) ? limpiarCadena($_POST["fecha_hora"]) : "";
$impuesto = isset($_POST["impuesto"]) ? limpiarCadena($_POST["impuesto"]) : "";
$total_venta = isset($_POST["total_venta"]) ? limpiarCadena($_POST["total_venta"]) : "";
$nacionalidad = isset($_POST["nacionalidad"]) ? limpiarCadena($_POST["nacionalidad"]) : "";

// Seleccionar la operación según el valor de $_GET["op"]
switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idventa)) {
            // Insertar nueva venta
            try {
                $rspta = $venta->insertar(
                    $idcliente,
                    $idusuario,
                    $tipo_comprobante,
                    $serie_comprobante,
                    $num_comprobante,
                    $fecha_hora,
                    $impuesto,
                    $total_venta,
                    $nacionalidad,
                    $_POST["idarticulo"],
                    $_POST["cantidad"],
                    $_POST["precio_venta"],
                    $_POST["descuento"]
                );
                echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
            } catch (Exception $e) {
                echo "Error al insertar datos: " . $e->getMessage();
            }
        } else {
            // Lógica para editar, si es necesario
        }
        break;


        

    case 'listar':
        // Listar ventas
        $rspta = $venta->listar();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            // Construir la URL según el tipo de comprobante
            $url = ($reg->tipo_comprobante == 'Ticket') ? '../reportes/exTicket.php?id=' : '../reportes/exFactura.php?id=';

            $data[] = array(
                "0" => (($reg->estado == 'Aceptado') ? '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idventa.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>').
                        '<a target="_blank" href="'.$url.$reg->idventa.'"> <button class="btn btn-info btn-xs"><i class="fa fa-file"></i></button></a>',
                "1" => $reg->fecha,
                "2" => $reg->cliente,
                "3" => $reg->usuario,
                "4" => $reg->tipo_comprobante,
                "5" => $reg->serie_comprobante. '-' .$reg->num_comprobante,
                "6" => $reg->total_venta,
                "7" => ($reg->estado == 'Aceptado') ? '<span class="label bg-green">Aceptado</span>' : '<span class="label bg-red">Anulado</span>',
                "8" => $reg->nacionalidad
                
                
            );
        }
        $results = array(
            "sEcho" => 1,                   // Información para datatables
            "iTotalRecords" => count($data),// Total de registros para datatables
            "iTotalDisplayRecords" => count($data), // Total de registros a mostrar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'selectCliente':
        // Listar clientes
        require_once "../modelos/Persona.php";
        $persona = new Persona();
        $rspta = $persona->listarc();

        while ($reg = $rspta->fetch_object()) {
            echo '<option value='.$reg->idpersona.'>'.$reg->nombre.'</option>';
        }
        break;

    case 'listarArticulos':
        // Listar artículos para venta
        require_once "../modelos/Articulo.php";
        $articulo = new Articulo();
        $rspta = $articulo->listarActivosVenta();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idarticulo.',\''.$reg->nombre.'\','.$reg->precio_venta.')"><span class="fa fa-plus"></span></button>',
                "1" => $reg->nombre,
                "2" => $reg->categoria,
                "3" => $reg->codigo,
                "4" => $reg->stock,
                "5" => $reg->precio_venta,
                "6" => "<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px'>"
            );
        }
        $results = array(
            "sEcho" => 1,                   // Información para datatables
            "iTotalRecords" => count($data),// Total de registros para datatables
            "iTotalDisplayRecords" => count($data), // Total de registros a mostrar
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}
?>