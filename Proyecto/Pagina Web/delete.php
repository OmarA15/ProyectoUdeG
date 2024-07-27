<?php
$conexion = new mysqli('localhost', 'id21546392_omar', 'Ak3no/21', 'id21546392_datose');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "DELETE FROM DatosP WHERE Hora = (SELECT DISTINCT  MIN(Hora), MIN(Dia) FROM DatosP WHERE Puerta_Entrada = 1)";
$conexion->query($sql);
$conexion->close();
?>
