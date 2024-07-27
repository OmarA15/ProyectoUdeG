<?php
// Crear una conexión a la base de datos
$conexion = new mysqli('localhost', 'id21546392_omar', 'Ak3no/21', 'id21546392_datose');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monitor 1</title>
</head>
<body>


    <h2>Monitor 1</h2>
     
   
    <fieldset>
        <img src="https://www.udgusa.org/assets/img/others/que-es-la-udg.jpg" >
        <legend id="fecha"></legend>
        <h2 id="reloj"> </h2>
        
        <script>
            setInterval(F5, 60000);
            function F5(){
                <?php
                $sql = "DELETE FROM DatosP WHERE Hora = (SELECT DISTINCT  MIN(Hora), MIN(Dia) FROM DatosP WHERE Puerta_Entrada = 1)";
                ?>
            }
            
        </script>
        
        <?php
                $sql = "SELECT * FROM DatosP WHERE Puerta_Entrada = 1 ORDER BY Hora ASC, Dia ASC LIMIT 1";
                $resultado = $conexion->query($sql);
                
                $fila = $resultado->fetch_assoc();
                
                
                
                ?>
        <?php
        echo "Nombre: " . $fila['Nombre'] . "<br>";
        echo "Carro: " . $fila['Carro'] . "<br>";
        echo "Color: " . $fila['Color'] . "<br>";
        echo "Placas: " . $fila['Placas'] . "<br>";
        echo "Hora: " . $fila['Hora'] . "<br>";
        echo "Fecha: " . $fila['Dia'] . "<br>";
        echo "Modulo: " . $fila['Modulo'] . "<br>";

        // Liberar el resultado
        
        $resultado->free();
        
       // $conexion->query($sql);
        ?>
        
    </fieldset>
    <script >
       
    </script>
    <script src="FormatoHora.js"></script>
    
   
</body>
</html>
