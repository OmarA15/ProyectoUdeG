<?php

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del cuerpo de la solicitud
    $datosJson = file_get_contents('php://input');

    // Decodifica los datos JSON
    $datos = json_decode($datosJson, true);

    // Verifica si se pudo decodificar el JSON correctamente
    if ($datos !== null) {
        // Conexión a la base de datos (ajusta según tus credenciales)
        $conexion = new mysqli('localhost', 'id21546392_omar', 'Ak3no/21', 'id21546392_datose');

        // Verifica la conexión
        if ($conexion->connect_error) {
            die('Error de conexión: ' . $conexion->connect_error);
        }

        // Escapa los datos para prevenir SQL injection (solo un ejemplo, considera usar sentencias preparadas)
        $nombre = $conexion->real_escape_string($datos['nombre']);
        $carro = $conexion->real_escape_string($datos['carro']);
        $color = $conexion->real_escape_string($datos['color']);
        $placas = $conexion->real_escape_string($datos['placas']);
        $hora = $conexion->real_escape_string($datos['hora']);
        $dia = $conexion->real_escape_string($datos['dia']);
        $modulo = $conexion->real_escape_string($datos['modulo']);
        $puertaEntrada = $conexion->real_escape_string($datos['puertaEntrada']);

        // Inserta los datos en la base de datos
        $query = "INSERT INTO registros (nombre, carro, color, placas, hora, dia, modulo, puertaEntrada) 
                  VALUES ('$nombre', '$carro', '$color', '$placas', '$hora', '$dia', '$modulo', '$puertaEntrada')";

        if ($conexion->query($query) === TRUE) {
            // Operación exitosa
            echo json_encode(['success' => true, 'message' => 'Datos almacenados correctamente en la base de datos']);
        } else {
            // Error en la operación
            echo json_encode(['success' => false, 'message' => 'Error al insertar datos en la base de datos: ' . $conexion->error]);
        }

        // Cierra la conexión
        $conexion->close();
    } else {
        // Si no se pudo decodificar el JSON, devolvemos un mensaje de error
        echo json_encode(['success' => false, 'message' => 'Error al decodificar los datos JSON']);
    }
} else {
    // Si la solicitud no es de tipo POST, devolvemos un mensaje de error
    echo json_encode(['success' => false, 'message' => 'La solicitud debe ser de tipo POST']);
}

?>
