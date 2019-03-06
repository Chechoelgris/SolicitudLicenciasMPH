<?php
include_once '../intranet/phpintra/conexion.php'; 

echo '<pre>';
echo 'hasta aqui oc';

$rut_usr = $_POST['rut'];


echo '<pre>';
var_dump($rut_usr);
echo '</pre>';

                            
    $select_consulta = 'SELECT * FROM TA_persona WHERE rut_persona = ?';
    $sentencia_consultar = $conn->prepare($select_consulta);
    $sentencia_consultar->execute(array($rut_usr));
    $resultado = $sentencia_consultar->fetch();

    

    if (!$resultado) {

        //matar operacion
        echo 'No se han encontrado datos de solicitud asociados a este rut';
        //header('Location:../../login.php');
        die();
    }else{
        $_SESSION['id'] = $resultado['id_persona'];
    
        $select_consulta2 = 'SELECT * FROM TA_solicitud WHERE fk_id_persona = ?';
        $sentencia_consultar2 = $conn->prepare($select_consulta2);
        $sentencia_consultar2->execute(array($_SESSION['id']));
        $resultado2 = $sentencia_consultar2->fetch();
       
    } 
    var_dump($resultado2);
    