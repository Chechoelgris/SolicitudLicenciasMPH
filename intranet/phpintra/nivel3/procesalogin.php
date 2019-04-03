<?php 
session_start();




echo '<br> 1- Conexion a base de datos<br>';
include_once '../conexion.php'; 
echo '<br> 2- Obtenemos datos POST: <br>';

$rut_log = $_POST['rut'];
$pass_log = $_POST['passlog'];

echo '<br>'.$rut_log;

echo '<br>'.$pass_log;

echo '<br> Hacemos la consulta usando los datos obtenidos.';
    $select_validacion = 'SELECT * FROM ta_usuario WHERE rut_usuario = ?';
    $sentencia_consultar = $conn->prepare($select_validacion);
    $sentencia_consultar->execute(array($rut_log));
    $resultado=$sentencia_consultar->fetch();




    echo '<br> Resultado de la consulta => ';
    print_r($resultado);
    echo '<br>';
 echo '<br>3- Ahora validamos el estado de la consulta.';
    if (!$resultado) {
         //matar operacion
         echo '<>No existe usuario';
         header('Location:../cerrar.php');         
         die();
    }
    echo '<br>4- Pasamos validacion de usuario, ahora procesamos contrasena.';

    if (password_verify($pass_log, $resultado['pass_usuario'])) {
        
       // LAS CONTRASENAS SON IGUALES
      $_SESSION['user'] = $resultado['nombre_usuario'];
      $_SESSION['tipo'] = $resultado['tipo_usuario'];
      echo '<br> quinto y final';

      header('Location:../../index.php');

    }else {
       $sentencia_consultar=null;
        $conn=null;

        echo 'Las contrasenas no coinciden';
        header('Location:../cerrar.php');
        die();
    }
    
