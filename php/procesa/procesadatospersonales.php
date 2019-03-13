<?php include_once '../../intranet/phpintra/conexion.php'; 
session_start();
$copiaencontrado = $_SESSION['encontrado'];

                                                 //los datos obtenidos por POST
            $nombre = $_POST['ingresonombre'];                                                //del formulario de ingreso. 
            $apellidop = $_POST['ingresapellidop'];                                                                 //se usaran para el insert o update
            $apellidom = $_POST['ingresapellidom'];
            $fechanac = $_POST['fechanacimiento'];
            $sexo = $_POST['sexo'];
            $email =  $_POST['email'];
            $telefono  = $_POST['telefono'];
            
            $rut = $_SESSION['rut'];
            

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Esta dirección de correo ($email) es válida.";
            }

if($copiaencontrado){
    echo 'whatwhat si';                        //update con los datos ingresados
    $consulta_update =          'UPDATE TA_persona 
                                 SET nombre_persona=(?),apellidop_persona=(?), apellidom_persona=(?), 
                                 fechan_persona=(?), sexo_persona=(?), correo_persona=(?), telefono_persona=(?)
                                 WHERE rut_persona=(?)';

    $sentencia_update = $conn->prepare($consulta_update); 

    if ($sentencia_update->execute(array(utf8_decode($nombre), utf8_decode($apellidop), utf8_decode($apellidom), $fechanac, $sexo, utf8_decode($email), $telefono, $rut))){
        echo 'editado exitosamente  brotah<br>';
        

    }else{
        echo 'No editado derp <br>';
    } 
 


}else{

    echo 'what ma brotah no';                  //insert con los datos nuevos
}