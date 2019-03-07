<?php 
session_start();
utf8_encode($_SESSION['tipo']);
if  (!isset($_SESSION['tipo'])) {

  header('Location:../../login.php');
}

include_once 'conexion.php'; 

$rut_log = $_POST['rut'];
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
        header('Location:../../login.php');
        die();
    }

    if (password_verify($pass_log, $resultado['pass_usuario'])) {
       // LAS CONTRASENAS SON IGUALES
      $_SESSION['user'] = $resultado['nombre_usuario'];
      $_SESSION['tipo'] = $resultado['tipo_usuario'];

      header('Location:../index.php');

    }else {
       $sentencia_consultar=null;
        $conn=null;

        echo 'Las contrasenas no coinciden';
        header('Location:../../login.php');
        die();
    }
    
