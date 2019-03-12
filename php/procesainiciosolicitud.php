<?php
include_once '../intranet/phpintra/conexion.php'; 
session_start();
$rut_usr = $_SESSION['rut']; //rut pasado por parametro para consultar.
$encont = false;


        $select_preguntar = 'SELECT * FROM TA_Usuario WHERE rut_usuario = ?';
        $sentencia_preguntar = $conn->prepare($select_preguntar);
        $sentencia_preguntar->execute(array($rut_usr));
        $resultado_preguntar = $sentencia_preguntar->fetch();

        if ($resultado_preguntar) {
        
            echo '<br>Datos encontrados!';
            $encont=true;
            
        }else{
            echo '<br>No existe el men';
            $encont=false;
        }


/*

$uploadedfileload="true"; //Esta variable será el indicador que nos permita avanzar en el script
$msg;

if ($_FILES['archivo']['size']>2000000){                                                                     // Validacion de tamaño
    $msg="El archivo es mayor que 2000KB, debes reduzcirlo antes de subirlo<BR>";
    $uploadedfileload="false";
}
echo 'pasa validacion de tamaño';
echo '<br>';
if (!($_FILES['archivo']['type'] =="image/jpeg" OR $_FILES['archivo']['type'] =="image/gif")){// Validacion de formato
    $msg="Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
    $uploadedfileload="false";
}

echo 'pasa validacion de formato';
echo '<br>';

$nameFilearchivo= $_FILES['archivo']['name']; // obtenemos nombre del archivo
$tmpFilearchivo = $_FILES['archivo']['tmp_name']; // obtenemos ruta temporal del archivo 
                                                  //(aqui se suben por defecto siempre, luego hay que moverlos)

$info = new SplFileInfo($nameFilearchivo); // obtenemos la extensión del archivo
var_dump($info->getExtension()); // mostramos la extensión del archivo
$nombrenuevo = time().$info; // nuevo subfijo al nombre: fecha actual (con segundos) + extension. Asi todos seran diferentes.
$ruta = "../resources/subidas/"; // se define la ruta de destino.
$ruta = $ruta . basename( $nombrenuevo); // se le agrega al nombre actual el nuevo subfijo creado arriba, ahora no habran nombres repetidos.


if($uploadedfileload=="true"){
    if(move_uploaded_file($tmpFilearchivo, $ruta)) {
        echo "El archivo ".  basename( $nombrenuevo). 
        " ha sido subido";
    } else{
        echo "Ha ocurrido un error, trate de nuevo!";
    }
}else{echo $msg;}
echo '<br>';
echo $nombrenuevo;
echo '<br>';
echo $ruta;




// Hastá aqui, si el archivo cumple con las condiciones, se formatea y se sube al directorio indicado. 
//Ahora hay que ingresar su nombre en la bd, junto a su ruta, para poder acceder a el cuando haya que validar.


if( file_exists($ruta) == true )
echo "<p>El archivo existe</p>";
else
echo "<p>El archivo no se ha encontrado</p>";
$cer = 1;


    $select_validacion = 'SELECT * FROM TA_acreditadomicilio WHERE id_archivo = ?';
    $sentencia_consultar = $conn->prepare($select_validacion);
    $sentencia_consultar->execute(array($cer));
    $resultado = $sentencia_consultar->fetch();

   var_dump ($resultado);
   ?>

        <a href="<?php  echo $resultado['ruta_archivo']; ?>">as</a>

   <?php

*/

    