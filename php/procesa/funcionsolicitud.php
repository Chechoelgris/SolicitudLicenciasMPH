<?php
session_start():
include_once '../../intranet/phpintra/conexion.php'; 


 
    
    $insertfinal = 'INSERT INTO TA_Solicitud(
                                fk_id_persona, 
                                fk_id_archivo, 
                                fk_id_licencia, 
                                estado_solicitud, 
                                fk_id_fecha, 
                                fk_id_direccion) 
                    VALUES      (?,?,?,?,?,?)';

    $sentencia_insertfinal = $conn->prepare($insertfinal);

    if ($sentencia_insertfinal->execute(array($a,$b,$c,$d,$e,$f))) {
        $_SESSION['listo']=true;
    }else {
        $_SESSION['listo']=false;
    }

