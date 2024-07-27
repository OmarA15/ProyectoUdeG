<?php

// Conexión a la base de datos (ajusta según tus credenciales)
$conexion = new mysqli();

// Verifica la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Consulta para obtener datos (ajusta según tu estructura de base de datos)
$query = "SELECT * FROM DatosP WHERE Puerta_Entrada = 1"; // Cambia 1 por el valor que necesitas
$resultado = $conexion->query($query);

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    echo "<h2>Datos de la Puerta 1:</h2>";
    echo "<ul>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<li>Nombre: " . $fila['nombre'] . ", Carro: " . $fila['carro'] . ", Color: " . $fila['color'] . "</li>";
        // Puedes agregar más campos según tu estructura de base de datos
    }
    echo "</ul>";
} else {
    echo "<p>No hay datos para la Puerta 1.</p>";
}

// Cierra la conexión
$conexion->close();

?>
