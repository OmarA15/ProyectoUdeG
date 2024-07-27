<?php
// Crear una conexión a la base de datos
$conexion = new mysqli('localhost', 'id21546392_omar', 'Ak3no/21', 'id21546392_datose');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Eliminar el registro con la hora más baja
$sql = "DELETE FROM DatosP WHERE Hora = (SELECT MIN(Hora) FROM DatosP WHERE Puerta_Entrada = 1)";
$conexion->query($sql);

// Cerrar la conexión
$conexion->close();
?>
