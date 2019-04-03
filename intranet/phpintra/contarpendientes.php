<?php
include_once 'conexion.php';//Conexion a la Base de datos
$sql = "SELECT *  
        from ta_solicitud 
        WHERE estado_solicitud = ?";

$pendo='Pendiente';
$sentencia = $conn->prepare($sql);// Preparamos la consulta a la base de datos

if ($sentencia->execute(array($pendo))) {// Ejecutamos la consulta
    $resultado = $sentencia->fetchAll(); //Obtenemos los datos
    $cont = 0;
    
    foreach ($resultado as $pend) {
        $cont++;
    }
    
    $_SESSION['pendientes'] = $cont;
} else {
    echo 'aaa<br>aaaaaaaaa<br>aaaaaaaaaaaaa<br>aaaaaaaaa<br>aaaaaaa<br>aaaaaaaa Pendientes<br>';
}
