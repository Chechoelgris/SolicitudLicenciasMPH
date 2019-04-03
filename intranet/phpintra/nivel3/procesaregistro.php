<?php 
session_start();
utf8_encode($_SESSION['tipo']);
if  (!isset($_SESSION['tipo'])) {

  header('Location:../../../login.php');
}//validacion de sesion iniciada
if ($_SESSION['tipo']=='Funcionario') {
    header('Location:../../../login.php');
  }//validacion de perfil de sesion

    //CONEXION A LA BASE DE DATOS
    include_once '../conexion.php'; 

    //CAPTURAR DATOS POR POST
    $rut_nuevo = $_POST['rut'];
    $nombre_nuevo = $_POST['nombrenuevo'];
    $apellidop_nuevo = $_POST['apellidopnuevo'];
    $apellidom_nuevo = $_POST['apellidomnuevo'];

    $correo_nuevo = $_POST['correonuevo'];
    $pass_nuevo = $_POST['passnuevo'];
    $pass_conf = $_POST['passnuevo2'];
    $tipo_nuevo = $_POST['tiponuevo'];

    //VERIFICAR USUARIOS DUPLICADOS

    $select_validacion = 'SELECT * FROM ta_Usuario WHERE rut_usuario = ?';
    $sentencia_consultar = $conn->prepare($select_validacion);
    $sentencia_consultar->execute(array($rut_nuevo));

    $resultado = $sentencia_consultar->fetch();

    //var_dump($resultado);

    if ($resultado) {
        
        echo '<br>Existe el usuario';
        die();
    }

    

    //HASH DE CONTRASEÑAS
    $pass_nuevo = password_hash($pass_nuevo, PASSWORD_DEFAULT);


    //VERIFICACION DE CONTRASEÑAS
    if (password_verify($pass_conf, $pass_nuevo)) {
        echo '¡La contraseña es válida!<br>';
      
        //SI LA CONTRASEÑA PASA LA VALIDACION, ENTONCES SE ALMACENA EN LA BD
        $sql_agregar= 'INSERT INTO ta_usuario (rut_usuario, nombre_usuario, apellidop_usuario, apellidom_usuario, correo_usuario, pass_usuario, tipo_usuario) VALUES (?,?,?,?,?,?,?)';
		$sentencia_agregar = $conn->prepare($sql_agregar);
        
        if ($sentencia_agregar->execute(array($rut_nuevo, utf8_decode($nombre_nuevo), utf8_decode($apellidop_nuevo), utf8_decode($apellidom_nuevo), utf8_decode($correo_nuevo), utf8_decode($pass_nuevo), $tipo_nuevo ) )) {
            echo 'Agregado exitosamente <br>';
             header('location:../listarusuarios.php');
             
        }else{
            echo 'No agregado <br>';
            header('location:../registrousuario.php');
        }
        

        $sentencia_agregar=null;
        $conn=null;
        echo '<br>no pasan las contrasenas';
        header('location:../registrousuario.php');
       // header('location:../listarusuarios.php');
    } else {
        header('location:../registrousuario.php');
        echo 'La contraseña no coinciden.';

    }
    
    
    

    
?>