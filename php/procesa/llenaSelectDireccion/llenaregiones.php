<?php

foreach ($regiones as $reg) {

$consulta_llenarregiones = 'INSERT INTO Ta_region(nombre_region) 
                            VALUES (?)';

$sentencia_insert = $conn->prepare($consulta_llenarregiones);
$sentencia_insert->execute(array(utf8_decode($reg)));

}


$sql = "SELECT * FROM ta_region";

$sentencia = $conn->prepare($sql);// Preparamos la consulta a la base de datos
$sentencia->execute();            // Ejecutamos la consulta
$resultado = $sentencia->fetchAll(); //Obtenemos los datos
$cont = 0;


foreach ($resultado as $reg) {
    
}
















