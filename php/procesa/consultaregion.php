<?php
include_once '../../intranet/phpintra/conexion.php'; 

if (isset($_POST['region'])) {
    $region = $_POST['region'];

    $sql='SELECT * FROM TA_region WHERE id_region = ?';
    $sentencia = $conn->prepare($sql);
    $sentencia->execute(array($region)); 
    $resultado = $sentencia->fetch();

    if ($resultado) {
        //echo utf8_encode($resultado['nombre_region'];
        echo $region;
       
    }
     
}
