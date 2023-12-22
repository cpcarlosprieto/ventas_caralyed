<?php
// Incluir la clase Persona
require_once "../modelos/Persona.php";

// Crear una instancia de la clase Persona
$persona = new Persona();

// Obtener valores del formulario o de la URL según la operación
$idpersona = isset($_POST["idpersona"]) ? limpiarCadena($_POST["idpersona"]) : "";
$tipo_persona = isset($_POST["tipo_persona"]) ? limpiarCadena($_POST["tipo_persona"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$tipo_documento = isset($_POST["tipo_documento"]) ? limpiarCadena($_POST["tipo_documento"]) : "";
$num_documento = isset($_POST["num_documento"]) ? limpiarCadena($_POST["num_documento"]) : "";
$direccion = isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]) : "";
$telefono = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
$email = isset($_POST["email"]) ? limpiarCadena($_POST["email"]) : "";

// Switch para determinar la operación a realizar según el valor de $_GET["op"]
switch ($_GET["op"]) {
    case 'guardaryeditar':
        // Verificar si es una inserción o actualización
        if (empty($idpersona)) {
            // Insertar nueva persona
            $rspta = $persona->insertar($tipo_persona, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            // Editar persona existente
            $rspta = $persona->editar($idpersona, $tipo_persona, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    case 'eliminar':
        // Eliminar persona
        $rspta = $persona->eliminar($idpersona);
        echo $rspta ? "Datos eliminados correctamente" : "No se pudo eliminar los datos";
        break;

    case 'mostrar':
        // Mostrar detalles de persona
        $rspta = $persona->mostrar($idpersona);
        echo json_encode($rspta);
        break;

    case 'listarp':
        // Listar personas de tipo "Proveedor"
        $rspta = $persona->listarp();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idpersona . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="eliminar(' . $reg->idpersona . ')"><i class="fa fa-trash"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->tipo_documento,
                "3" => $reg->num_documento,
                "4" => $reg->telefono,
                "5" => $reg->email
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

    case 'listarc':
        // Listar personas de tipo "Cliente"
        $rspta = $persona->listarc();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idpersona . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="eliminar(' . $reg->idpersona . ')"><i class="fa fa-trash"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->tipo_documento,
                "3" => $reg->num_documento,
                "4" => $reg->telefono,
                "5" => $reg->email
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
