<?php 
session_start();
utf8_encode($_SESSION['tipo']);

if (!isset($_SESSION['tipo'])) {
    header('Location:../../../login.php');
}//validacion de sesion iniciada

if ($_SESSION['tipo']!='Funcionario' && $_SESSION['tipo']!='Administrador') {
    header('Location:../../../login.php');
}//validacion de perfil de sesion


include_once '../conexion.php'; //CONEXION A LA BASE DE DATOS


$idsol = $_GET['id'];//obtenemos el id de la solicitud a aceptar enviado por get


if (!$_GET){//Aqui confirmamos que recibimos el dato por get. Si no fue el caso, se redirige a la pagina anterior.
         header('Location:../solicitudespendientes.php?pagina=1');
    } 


    // Definimos la consulta a la base de datos
    $sql_consulta = 'SELECT id_solicitud, estado_solicitud , ta_persona.rut_persona  
                     FROM ta_solicitud 
                     INNER JOIN ta_persona 
                     ON ta_solicitud.fk_id_persona = ta_persona.id_persona 
                     WHERE id_solicitud = ?';

    $sentencia_consultar = $conn->prepare($sql_consulta); // Preparamos la consulta a la base de datos
    $sentencia_consultar->execute(array($idsol));         // Ejecutamos la consulta
    $resultado = $sentencia_consultar->fetch(); 
    
    
    $id_rechazar = $resultado['id_solicitud'];
    if ($idsol != $resultado['id_solicitud']) {
            header('Location:../solicitudespendientes.php?pagina=1');
        
    }
        // Definimos la inserciñón a la base de datos
        $sql_cambio  = 'UPDATE ta_solicitud 
                        SET estado_solicitud = "Aceptada"  
                        WHERE id_solicitud = ?';

        $sentencia_cambio = $conn->prepare($sql_cambio); // Preparamos la consulta a la base de datos
        $sentencia_cambio->execute(array($idsol));         // Ejecutamos la consulta
        $cambiores = $sentencia_cambio->fetch(); 
    
    
    
    
        $sentencia_cambio=null;
        $conn=null;
        header('Location:../solicitudespendientes.php');
    ?>
   
  
   