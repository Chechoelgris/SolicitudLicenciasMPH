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

$licencias = array(
        
  "A1","A2","A3","A4","A5","B","C","D","A1-A2 Ley 18.290"

);

echo '<br>';
function licencia($licencias,$conn){
      $contadore=1;

      foreach ($licencias as $lic) {

          echo '<br>For cont:'.''.$contadore.''.'<br>';
              $insertlicencia = 'INSERT INTO ta_claselicencia(tipo_licencia) 
                              VALUES (?)';
              $sentencia_insertl = $conn->prepare($insertlicencia);
              $sentencia_insertl->execute(array($lic)); 
              
              $contadore++;
      }           
}

licencia($licencias,$conn);

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
$rut_nuevo = '19.001.795-8';
$nombre_nuevo = 'Sergio';
$apellidop_nuevo = 'Sepúlveda';
$apellidom_nuevo = 'Muñoz';
$correo_nuevo = 'so.sepulveda.m@gmail.com';
$pass_nuevo = 'checho1994';
$tipo_nuevo = 'Funcionario';
//HASH DE CONTRASEÑAS
$pass_nuevo = password_hash($pass_nuevo, PASSWORD_DEFAULT);
$sql_agregar= 'INSERT INTO TA_Usuario (rut_usuario, nombre_usuario, apellidop_usuario, apellidom_usuario, correo_usuario, pass_usuario, tipo_usuario) VALUES (?,?,?,?,?,?,?)';
$sentencia_agregar = $conn->prepare($sql_agregar);
    
    if ($sentencia_agregar->execute(array($rut_nuevo, utf8_decode($nombre_nuevo), utf8_decode($apellidop_nuevo), utf8_decode($apellidom_nuevo), utf8_decode($correo_nuevo), $pass_nuevo, $tipo_nuevo ) )) {
        echo 'Usuario Agregado exitosamente <br>';

    }else{
        echo 'No agregado <br>';
      }

      




