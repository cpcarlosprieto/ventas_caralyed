<?php
// Incluimos el modelo necesario
require_once "../modelos/Categoria.php";

// Creamos una instancia de la clase Categoria
$categoria = new Categoria();

// Obtenemos los datos provenientes del formulario
$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

// Verificamos la operación solicitada
switch ($_GET["op"]) {
    // Caso para insertar o editar una categoría
    case 'guardaryeditar':
        // Si el idcategoria está vacío, insertamos una nueva categoría
        if (empty($idcategoria)) {
            $rspta = $categoria->insertar($nombre, $descripcion);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            // Si el idcategoria no está vacío, editamos la categoría existente
            $rspta = $categoria->editar($idcategoria, $nombre, $descripcion);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    // Caso para desactivar una categoría
    case 'desactivar':
        $rspta = $categoria->desactivar($idcategoria);
        echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
        break;

    // Caso para activar una categoría
    case 'activar':
        $rspta = $categoria->activar($idcategoria);
        echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
        break;

    // Caso para mostrar los detalles de una categoría
    case 'mostrar':
        $rspta = $categoria->mostrar($idcategoria);
        echo json_encode($rspta);
        break;

    // Caso para listar todas las categorías
    case 'listar':
        $rspta = $categoria->listar();
        $data = Array();

        // Recorremos los resultados y los almacenamos en un array
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => ($reg->condicion) ? '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idcategoria . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="desactivar(' . $reg->idcategoria . ')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idcategoria . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-primary btn-xs" onclick="activar(' . $reg->idcategoria . ')"><i class="fa fa-check"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->descripcion,
                "3" => ($reg->condicion) ? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
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
