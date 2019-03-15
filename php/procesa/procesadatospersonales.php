<?php include_once '../../intranet/phpintra/conexion.php'; 
session_start();
$copiaencontrado = $_SESSION['encontrado'];

            $rut = $_SESSION['rut'];                                 //los datos obtenidos por POST
            $nombre = $_POST['ingresonombre'];
            $_SESSION['nombre'] = $_POST['ingresonombre'];           //del formulario de ingreso. 
            $apellidop = $_POST['ingresapellidop'];                  //se usaran para el insert o update
            $apellidom = $_POST['ingresapellidom'];
            $fechanac = $_POST['fechanacimiento'];
            $sexo = $_POST['sexo'];
            $email =  $_POST['email'];
            $telefono  = $_POST['telefono'];           

//Validacion en php de campos vacios
                if (!empty($_POST['ingresonombre']) 
                && !empty($_POST['ingresapellidop']) 
                && !empty($_POST['ingresapellidom']) 
                && !empty($_POST['fechanacimiento']) && !empty($_POST['sexo']) && !empty($_POST['email']) && !empty($_POST['telefono']) ) {
//Validacion en php de largo de variables                            
                            if(strlen($_POST['ingresonombre']) < 40 
                            && strlen($_POST['ingresapellidop']) < 50 
                            && strlen($_POST['ingresapellidom']) < 50 
                            && strlen($_POST['email']) < 50 
                            && strlen($_POST['telefono']) < 13){                                           
//Validacion en php de email 
                                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            $_SESSION['fallaemail']=true;
                                            header('location:../datospersonales.php');
                                            
                                        }
 if($copiaencontrado){
//     UPDATE con los datos ingresados
                                        $consulta_update ='UPDATE TA_persona 
                                        SET nombre_persona=(?),apellidop_persona=(?), apellidom_persona=(?), 
                                        fechan_persona=(?), sexo_persona=(?), correo_persona=(?), telefono_persona=(?)
                                        WHERE rut_persona=(?)';

                                        $sentencia_update = $conn->prepare($consulta_update); 

                                        if ($sentencia_update->execute(array(utf8_decode($nombre), utf8_decode($apellidop), utf8_decode($apellidom), $fechanac, $sexo, utf8_decode($email), $telefono, $rut))){
                                                 echo 'editado exitosamente  brotah<br>';
                                                 $sentencia_update=null;
                                                 $conn=null;
                                                 header('location:../datosdireccion.php');
                                        }else{
                                            $_SESSION['fallaupdate'] = true;
                                            $sentencia_update=null;
                                            $conn=null;
                                            header('location:../datospersonales.php');
                                        } 
// --  FIN  --  UPDATE con los datos ingresados
}else{
//      INSERT con los datos ingresados
                                        $consulta_insert ='INSERT INTO TA_persona(rut_persona, nombre_persona, apellidop_persona, 
                                        apellidom_persona, fechan_persona, sexo_persona, correo_persona, telefono_persona) 
                                        VALUES (?,?,?,?,?,?,?,?)';
                                        $sentencia_insert = $conn->prepare($consulta_insert);

                                                if ($sentencia_insert->execute(array($rut, utf8_decode($nombre), utf8_decode($apellidop), utf8_decode($apellidom), $fechanac, $sexo, utf8_decode($email), $telefono))){
                                                    echo 'Datos nuevos guardados exitosamente  brotah<br>';
//                  Obtenemos el id para las relaciones

                                                                $select_validacion = 'SELECT * FROM TA_persona WHERE rut_persona = ?';
                                                                $sentencia_consultar = $conn->prepare($select_validacion);
                                                                $sentencia_consultar->execute(array($rut));
                                                                $resultado = $sentencia_consultar->fetch();
                                                                var_dump($resultado['id_persona']);
                                                                $_SESSION['id_persona'] = $resultado['id_persona'];
                                                                 $sentencia_consultar=null;
                                                                $conn=null;
                                                                header('location:../datosdireccion.php');
                                                }else{
                                                    $_SESSION['fallaupdate'] = true;
                                                    $sentencia_consultar=null;
                                                    $conn=null;
                                                    header('location:../datospersonales.php');
                                                } 


// --  FIN  --  INSERT con los datos ingresados
                                       
}






                            }else{
                                $_SESSION['fallalongitud'] = true;
                                header('location:../datospersonales.php');
                            }
                    

                }else {
                    
                    $_SESSION['vacios'];
                    header('location:../datospersonales.php');
                }
        


