<?php
// Incluir la clase Permiso
require_once "../modelos/Permiso.php";

// Crear una instancia de la clase Permiso
$permiso = new Permiso();

// Switch para determinar la operación a realizar según el valor de $_GET["op"]
switch ($_GET["op"]) {
    case 'listar':
        // Listar permisos
        $rspta = $permiso->listar();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => $reg->nombre
            );
        }
        $results = array(
            "sEcho" => 1, // info para datatables
            "iTotalRecords" => count($data), // enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), // enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}
?>
