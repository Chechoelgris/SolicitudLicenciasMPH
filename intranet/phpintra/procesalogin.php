<?php 
session_start();

include_once 'conexion.php'; 

$rut_log = $_POST['rutlog'];
$pass_log = $_POST['passlog'];

echo '<pre>';
var_dump($rut_log);
var_dump($pass_log);
echo '</pre>';


    $select_validacion = 'SELECT * FROM TA_Usuario WHERE rut_usuario = ?';
    $sentencia_consultar = $conn->prepare($select_validacion);
    $sentencia_consultar->execute(array($rut_log));
    $resultado = $sentencia_consultar->fetch();
    echo '<pre>';
    var_dump($resultado);
    echo '</pre>';

    if (!$resultado) {

        //matar operacion
        echo 'No existe usuario';
        die();
    }

    if (password_verify($pass_log, $resultado['pass_usuario'])) {
       // LAS CONTRASENAS SON IGUALES
      $_SESSION['user'] = $resultado['nombre_usuario'];
      header('Location:restrict.php');
    }else {
        echo 'Las contrasenas no coinciden';
        die();
    }
    
