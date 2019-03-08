<?php
$sql = "SELECT id_solicitud , ta_persona.rut_persona , ta_persona.nombre_persona , ta_persona.apellidop_persona , ta_fecha.fecha_asignada , ta_hora.hora_asignada ,ta_direccion.comuna_dir , ta_direccion.calle_dir , ta_direccion.numero_dir , ta_acreditadomicilio.ruta_archivo , ta_solicitud.estado_solicitud   
from ta_solicitud 

INNER JOIN ta_persona 
ON ta_solicitud.fk_id_persona = ta_persona.id_persona 

INNER JOIN ta_direccion 
ON ta_solicitud.fk_id_persona = ta_direccion.fk_id_persona

INNER JOIN ta_fecha
ON ta_solicitud.fk_id_fecha = ta_fecha.id_fecha

INNER JOIN ta_hora
ON ta_solicitud.fk_id_hora = ta_hora.id_hora

INNER JOIN ta_acreditadomicilio
ON ta_solicitud.fk_id_archivo = ta_acreditadomicilio.id_archivo

WHERE TA_solicitud.estado_solicitud = 'Pendiente'";

$sentencia = $conn->prepare($sql);// Preparamos la consulta a la base de datos
$sentencia->execute();            // Ejecutamos la consulta
$resultado = $sentencia->fetchAll(); //Obtenemos los datos
$cont = 0;

foreach ($resultado as $pend) {
    $cont++;
}

$_SESSION['pendientes'] = $cont;