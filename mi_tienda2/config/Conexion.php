<?php 
// Incluye el archivo global.php, que probablemente contiene las constantes para la configuración de la base de datos.
require_once "global.php";

// Crea una nueva instancia de la clase mysqli para establecer la conexión a la base de datos.
$conexion = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Establece la codificación de caracteres para la conexión a la base de datos.
mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

// Muestra un posible error en la conexión.
if (mysqli_connect_errno()) {
    printf("Falló en la conexión con la base de datos: %s\n", mysqli_connect_error());
    exit();
}

// Comprueba si la función 'ejecutarConsulta' no existe.
if (!function_exists('ejecutarConsulta')) {
    // Define la función 'ejecutarConsulta' que ejecuta una consulta SQL y devuelve el resultado.
    function ejecutarConsulta($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        return $query;
    }

    // Define la función 'ejecutarConsultaSimpleFila' que ejecuta una consulta SQL y devuelve una fila de resultados.
    function ejecutarConsultaSimpleFila($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    // Define la función 'ejecutarConsulta_retornarID' que ejecuta una consulta SQL y devuelve el ID del último registro insertado.
    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        return $conexion->insert_id;
    }

    // Define la función 'limpiarCadena' que limpia una cadena para evitar inyecciones SQL.
    function limpiarCadena($str) {
        global $conexion;
        $str = mysqli_real_escape_string($conexion, trim($str));
        return htmlspecialchars($str);
    }
}
?>
