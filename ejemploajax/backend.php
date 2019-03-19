<?php
include_once '../intranet/phpintra/conexion.php';
session_start();


if (isset($_POST['region'])) {
    $region = $_POST['region'];

    $sql='SELECT id_comuna, nombre_comuna FROM TA_comuna WHERE fk_id_region = ?';
    $sentencia = $conn->prepare($sql);
    $sentencia->execute(array($region)); 
    $resultado = $sentencia->fetch();

    if ($resultado) {
        
        echo json_encode($resultado);
    }
        
        
}else {
    $sql='SELECT * FROM TA_comuna WHERE fk_id_region = ?';
    $sentencia = $conn->prepare($sql);
    $region = 1;
    $sentencia->execute(array($region)); 
    $resultado = $sentencia->fetch();
    echo json_encode($resultado);
    echo '<br>';
    $c=0;

    foreach ($resultado as $res) {
        $c++;
        echo $res;
        echo '<br>';
    }
   echo $c;
     
}
     
