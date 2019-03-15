<?php
include_once '../../../intranet/phpintra/conexion.php'; 

include("listadecomunas.php"); 
include("llenaregiones.php"); 

function llenarcomuna($id,$comunas,$conn){
$conta=1;

    foreach ($comunas as $comu) {

        echo '<br><br>For cont:'.''.$conta.''.'<br>';
            $insertcomuna = 'INSERT INTO ta_comuna(nombre_comuna, fk_id_region) 
                            VALUES (?,?)';
            $sentencia_insert = $conn->prepare($insertcomuna);
            $sentencia_insert->execute(array(utf8_decode($comu),$id)); 
            
            $conta++;
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
    
    echo ' - ';
    
    echo utf8_encode($reg['nombre_region']);
    echo '<br>';

    if ($cont==1) {
       
    }
    switch ($cont) {
            case '1':
              llenarcomuna($reg['id_region'],$arica,$conn);
            break;

            case '2':
              llenarcomuna($reg['id_region'],$tarapaca,$conn);
            break;

            case '3':
              llenarcomuna($reg['id_region'],$antofagasta,$conn);
            break;

            case '4':
              llenarcomuna($reg['id_region'],$atacama,$conn);
            break;

            case '5':
              llenarcomuna($reg['id_region'],$coquimbo,$conn);
            break;

            case '6':
              llenarcomuna($reg['id_region'],$valparaíso,$conn);
            break;

            case '7':
              llenarcomuna($reg['id_region'],$ohiggins,$conn);
            break;

            case '8':
              llenarcomuna($reg['id_region'],$maule,$conn);
            break;

            case '9':
              llenarcomuna($reg['id_region'],$nuble,$conn);
            break;

            case '10':
              llenarcomuna($reg['id_region'],$biobio,$conn);
            break;

            case '11':
              llenarcomuna($reg['id_region'],$araucania,$conn);
            break;

            case '12':
              llenarcomuna($reg['id_region'],$rios,$conn);
            break;

            case '13':
              llenarcomuna($reg['id_region'],$lagos,$conn);
            break;
            case '14':
              llenarcomuna($reg['id_region'],$aisen,$conn);
            break;
            case '15':
              llenarcomuna($reg['id_region'],$magallanes,$conn);
            break;
            case '16':
              llenarcomuna($reg['id_region'],$metropolitana,$conn);
            break;
        default:
            
            break;
    }
    
    
  
 $cont++;
}