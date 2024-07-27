<?php

$Nombre = $_GET['nombre'];
$Carro = $_GET['carro'];
$Color = $_GET['color'];
$Placas = $_GET['placas'];
$Hora = $_GET['hora'];
$Dia = $_GET['dia'];
$Modulo = $_GET['modulo'];
$Puerta_Entrada = $_GET['puertaEntrada'];



//datos de conexion 
$server ="";
$user = "";
$pass = "";
$bd = "";
//conexion con el server de bd
$cone = mysqli_connect($server,$user,$pass,$bd);
if(!$cone){
    die("error al conectarse");
}

$sql = "INSERT INTO `DatosP` (`Nombre`, `Carro`, `Color`, `Placas`, `Hora`, `Dia`, `Modulo`, `Puerta_Entrada`)VALUES ('$Nombre','$Carro', '$Color', '$Placas', '$Hora', '$Dia', '$Modulo', '$Puerta_Entrada')";
mysqli_query($cone, $sql);
echo "Registro exitoso";
	
mysqli_close($conexion);

?>