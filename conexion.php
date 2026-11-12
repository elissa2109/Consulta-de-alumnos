<?php
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "escuela";
// Crear conexión
$conexion = new mysqli($host, $usuario, $password, $bd);
// Verificar si hay error
if ($conexion->connect_error) {
 die("Error en la conexión: " . $conexion->connect_error);
}
?>