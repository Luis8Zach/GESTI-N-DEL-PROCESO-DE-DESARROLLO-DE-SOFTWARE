<?php
$conexion = new mysqli("localhost", "root", "", "general");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres
if (!$conexion->set_charset("utf8")) {
    die("Error al establecer el conjunto de caracteres: " . $conexion->error);
}
?>
