<?php
// Incluimos el modelo necesario
require_once "../modelos/Articulo.php";

// Creamos una instancia de la clase Articulo
$articulo = new Articulo();

// Obtenemos los datos provenientes del formulario
$idarticulo = isset($_POST["idarticulo"]) ? limpiarCadena($_POST["idarticulo"]) : "";
$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$stock = isset($_POST["stock"]) ? limpiarCadena($_POST["stock"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";

// Verificamos la operación solicitada
switch ($_GET["op"]) {
    // Caso para insertar o editar un artículo
    case 'guardaryeditar':
        // Verificamos si el campo de imagen está vacío o no
        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            $imagen = $_POST["imagenactual"];
        } else {
            // Si se subió una nueva imagen, la guardamos en la carpeta correspondiente
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
            }
        }
        
        // Si el idarticulo está vacío, insertamos un nuevo artículo
        if (empty($idarticulo)) {
            $rspta = $articulo->insertar($idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            // Si el idarticulo no está vacío, editamos el artículo existente
            $rspta = $articulo->editar($idarticulo, $idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    // Caso para desactivar un artículo
    case 'desactivar':
        $rspta = $articulo->desactivar($idarticulo);
        echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
        break;

    // Caso para activar un artículo
    case 'activar':
        $rspta = $articulo->activar($idarticulo);
        echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
        break;

    // Caso para mostrar los detalles de un artículo
    case 'mostrar':
        $rspta = $articulo->mostrar($idarticulo);
        echo json_encode($rspta);
        break;

    // Caso para listar todos los artículos
    case 'listar':
        $rspta = $articulo->listar();
        $data = Array();

        // Recorremos los resultados y los almacenamos en un array
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => ($reg->condicion) ? '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idarticulo . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="desactivar(' . $reg->idarticulo . ')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idarticulo . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-primary btn-xs" onclick="activar(' . $reg->idarticulo . ')"><i class="fa fa-check"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->categoria,
                "3" => $reg->codigo,
                "4" => $reg->stock,
                "5" => "<img src='../files/articulos/" . $reg->imagen . "' height='50px' width='50px'>",
                "6" => $reg->descripcion,
                "7" => ($reg->condicion) ? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
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

    // Caso para obtener la lista de categorías para un elemento de selección
    case 'selectCategoria':
        require_once "../modelos/Categoria.php";
        $categoria = new Categoria();

        $rspta = $categoria->select();

        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
        }
        break;
}
?>
