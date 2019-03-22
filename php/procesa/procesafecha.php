<?php
include_once '../../intranet/phpintra/conexion.php'; 
session_start();


$idpersona = $_SESSION['id_persona'];
$idarchivo = $_SESSION['id_archivo'];
$idlicencia = $_SESSION['id_licencia'];
$iddireccion = $_SESSION['id_direccion'];
$fechasolicitud = $_POST['fechasolicitada'];





//$_SESSION['id_archivo']

//$_SESSION['id_archivo']

$cuposdisponibles=5;

if ($cuposdisponibles>0) {
echo '<br> Pasa cupos disponibles';
    
//==========================================================================================|
//--------------------------------Insert a TA_fecha-----------------------------------------|
//==========================================================================================|

                $insert_fecha = 'INSERT INTO ta_fecha(
                    fecha_asignada, 
                    fk_id_persona)
                    VALUES (?,?)';
                   

                $sentencia_insertfecha = $conn->prepare($insert_fecha);

                

                if ($sentencia_insertfecha->execute(array($fechasolicitud, $idpersona))) {
                    echo '<br> Pasa insert a fecha, obteniendo id';
//==========================================================================================|
//--------------------------------Recuperamos Id_fecha--------------------------------------|
//==========================================================================================|


                                            $select_validafecha = 'SELECT id_fecha 
                                                                    FROM ta_fecha 
                                                                    WHERE fecha_asignada = (?) 
                                                                    AND fk_id_persona = (?)';

                                            $select_validafecha = $conn->prepare($select_validafecha);

                                            $select_validafecha->execute(array($fechasolicitud, $idpersona));

                                            $resultadofech = $select_validafecha->fetch();
                                        
                                           
                                            $_SESSION['id_fecha'] = $resultadofech['id_fecha'];
                                            echo $_SESSION['id_fecha'];
//==========================================================================================|
//--------------------------------INSERT a TA_solicitud-------------------------------------|
//==========================================================================================|

                                                echo '<br> vamos a evaluar la existencia del id_fecha';
                                            if ($_SESSION['id_fecha']) {
                                                echo '<br> ID obtenida, pasa a insert de solicitud';

                                                        $insert_solicitud = 'INSERT INTO ta_solicitud(
                                                            fk_id_persona, 
                                                            fk_id_archivo,
                                                            fk_id_licencia,
                                                            fk_id_fecha,
                                                            fk_id_direccion,
                                                            estado_solicitud)
                                                            VALUES (?,?,?,?,?,?)';
                                                            $estadosolicitud = 'Pendiente';

                                                        $sentencia_solicitud = $conn->prepare($insert_solicitud);  
                                                        if ($sentencia_solicitud->execute(array($idpersona , $idarchivo ,$idlicencia ,$_SESSION['id_fecha'],$iddireccion ,$estadosolicitud ))) {

                                                                    echo '<br> Solicitud ingresada exitosamente';


                                                            
                                                        }else {
                                                            echo '<br> No se pudo ingresar la solicitud, falla modulo finak';
                                                        }


                                            }else {
                                                echo '<br> No se obtuvo id de fecha, penunltimo modulo';
                                            }
                }else {//if si se realiza el insert de fecha
                    echo '<br> no se logro insertar la info a fecha';
                }
}else {// inf si hay cupos
    echo '<br> No hay cupos';
} 



