<?php
include_once '../intranet/phpintra/conexion.php'; 

include("listacomunas.php"); 




function llenarcomuna($id,$comunas,$conn){


    foreach ($comunas as $comu) {
        
            $insertcomuna = 'INSERT INTO ta_comuna(nombre_comuna, fk_id_region) 
                            VALUES (?,?)';
            $sentencia_insert = $conn->prepare($insertcomuna);
            $sentencia_insert->execute(array(utf8_encode($comu),$id)); 
    }           
}

$sql = "SELECT * FROM ta_region";

$sentencia = $conn->prepare($sql);// Preparamos la consulta a la base de datos
$sentencia->execute();            // Ejecutamos la consulta
$resultado = $sentencia->fetchAll(); //Obtenemos los datos
$cont = 1;

foreach ($resultado as $reg) {
    
    echo '<br>';
    echo $reg['id_region'];
    
    echo '-';
    
    echo utf8_encode($reg['nombre_region']);


    if ($cont==1) {
       
    }
    switch ($cont) {
            case '1':
              llenarcomuna($reg['id_region'],$arica,$conn);
            break;

            case '2':
              llenarcomuna($reg['id_region'],$tarapaca,$conn);
            break;

            case '2':
              llenarcomuna($reg['id_region'],$tarapaca,$conn);
            break;

        default:
            # code...
            break;
    }
    
    
  
 $cont++;
}