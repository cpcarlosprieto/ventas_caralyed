<?php
// Incluir la conexión a la base de datos
require "../config/Conexion.php";

class Usuario {
    // Implementamos nuestro constructor
    public function __construct() {
    }

    // Método para insertar un registro de usuario
    public function insertar($nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos) {
        $sql = "INSERT INTO usuario (nombre, tipo_documento, num_documento, direccion, telefono, email, cargo, login, clave, imagen, condicion) VALUES ('$nombre', '$tipo_documento', '$num_documento', '$direccion', '$telefono', '$email', '$cargo', '$login', '$clave', '$imagen', '1')";
        $idusuarionew = ejecutarConsulta_retornarID($sql);
        $num_elementos = 0;
        $sw = true;

        // Insertar permisos del usuario en la tabla usuario_permiso
        while ($num_elementos < count($permisos)) {
            $sql_detalle = "INSERT INTO usuario_permiso (idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos = $num_elementos + 1;
        }
        return $sw;
    }

    // Método para editar un registro de usuario
    public function editar($idusuario, $nombre, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $imagen, $permisos) {
        $sql = "UPDATE usuario SET nombre='$nombre', tipo_documento='$tipo_documento', num_documento='$num_documento', direccion='$direccion', telefono='$telefono', email='$email', cargo='$cargo', login='$login', clave='$clave', imagen='$imagen' WHERE idusuario='$idusuario'";
        ejecutarConsulta($sql);

        // Eliminar permisos asignados
        $sqldel = "DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
        ejecutarConsulta($sqldel);

        $num_elementos = 0;
        $sw = true;

        // Insertar nuevos permisos del usuario
        while ($num_elementos < count($permisos)) {
            $sql_detalle = "INSERT INTO usuario_permiso (idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos = $num_elementos + 1;
        }
        return $sw;
    }

    // Método para desactivar un usuario
    public function desactivar($idusuario) {
        $sql = "UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    // Método para activar un usuario
    public function activar($idusuario) {
        $sql = "UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    // Método para mostrar los datos de un usuario
    public function mostrar($idusuario) {
        $sql = "SELECT * FROM usuario WHERE idusuario='$idusuario'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para listar todos los usuarios
    public function listar() {
        $sql = "SELECT * FROM usuario";
        return ejecutarConsulta($sql);
    }

    // Método para listar los permisos marcados de un usuario específico
    public function listarmarcados($idusuario) {
        $sql = "SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    // Función que verifica el acceso al sistema
    public function verificar($login, $clave) {
        $sql = "SELECT idusuario, nombre, tipo_documento, num_documento, telefono, email, cargo, imagen, login FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'";
        return ejecutarConsulta($sql);
    }
}
?>
