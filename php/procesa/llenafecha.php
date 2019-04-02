<?php

include_once '../../intranet/phpintra/conexion.php'; 
//session_start();



$select_validafecha = 'SELECT id_fecha 
FROM ta_fecha 
WHERE fecha_asignada = (?)';

$select_validafecha = $conn->prepare($select_validafecha);

$select_validafecha->execute(array($fechasolicitud));

$resultadofech = $select_validafecha->fetchall();



$contsoli=0;
foreach ($resultadofech as $soli) {
    $contsoli++;
}





if ($contsoli>0) {

    $select_validafecha = null;
    $conn=null;

    echo'<br>Hay solicitudes, no se puede';
    echo'<br>'.$contsoli;
    
    $_SESSION['existe2']=true;
    header('location:../ingresorut.php');   
    
}else {
    echo'NO hay solicitudes, hacer la wea xD';

    $insert_fecha = 'INSERT INTO ta_fecha(
        fecha_asignada, 
        fk_id_persona)
        VALUES (?,?)';
    $sentencia_insertfecha = $conn->prepare($insert_fecha);
    
    
    
    if ($sentencia_insertfecha->execute(array($fechasolicitud, $idpersona))) {
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
        echo'<br>Todo bien, terminamos de registrar la fecha';
        echo $_SESSION['id_fecha'];
    
    
    
                                                                    
                                                                     $sentencia_consultar=null;
                                                                    $conn=null;
              
          header('location:../datosdireccion.php');
    }else {
        $sentencia_insertfecha = null;
        $conn = null;
        echo '<br>estamos en el else, algo malo paso';
    }

    }